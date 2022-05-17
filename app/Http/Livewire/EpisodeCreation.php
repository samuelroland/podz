<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\Episode;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class EpisodeCreation extends Component
{
    use WithFileUploads;

    public $podcast;
    public $episode;
    public $datetime;   //bridge between episode.released_at and the view to manage format change
    public $file;

    protected $rules = [
        'episode.title' => 'required|max:60',
        'episode.description' => 'required|max:2000',
        'episode.hidden' => 'boolean',
        'episode.number' => 'integer',
        'datetime' => 'required|date',
        'file' => 'file|mimetypes:audio/mpeg,audio/ogg,audio/opus|max:15000000'
    ];

    public function mount()
    {
        $this->episode = Episode::make();
        $this->episode->hidden = false; //false by default
        $this->episode->number = $this->podcast->getNextEpisodeNumber();    //already set the number for the display
    }

    public function render()
    {
        return view('livewire.episode-creation');
    }

    public function updated($field)
    {
        $this->validateOnly($field);
    }

    public function updatingDatetime()
    {
        $this->episode->released_at = Carbon::parse($this->datetime);
        //todo: fix this. not working.
    }

    public function publish()
    {
        $this->validate();

        if ($this->podcast->author->is(auth()->user())) {

            $path = $this->file->store('episodes', 'public');
            $filename = Str::afterLast($path, "/");

            $this->episode->number = $this->podcast->getNextEpisodeNumber();
            $this->episode->podcast_id = $this->podcast->id;
            $this->episode->released_at = Carbon::parse($this->datetime);
            $this->episode->filename = $filename;
            $this->episode->save();
        }
    }
}
