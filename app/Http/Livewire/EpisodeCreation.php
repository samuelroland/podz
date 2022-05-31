<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\Episode;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;

class EpisodeCreation extends Component
{
    use WithFileUploads;

    public $podcast;
    public $episode;
    public $datetime;   //bridge between episode.released_at and the view to manage format change
    public $file;

    //As the rules are dynamically generated (contains an ID here), we need to wrap them in this function instead of $rules
    protected function rules()
    {
        return [
            'episode.title' => [
                'required',
                'max:60',
                Rule::unique(with(new Episode)->getTable(), 'title')->where(fn ($query) => $query->where('podcast_id', $this->podcast->id)),
            ],
            'episode.description' => 'required|max:2000',
            'episode.hidden' => 'boolean',
            'episode.number' => 'integer',
            'datetime' => 'required|date',
            'file' => 'required|file|max:150000|mimetypes:audio/mpeg,audio/ogg,audio/opus'
        ];
    }

    protected $messages = [
        'episode.title.unique' => 'Ce nom est déjà utilisé pour un autre épisode de ce podcast.',
    ];

    public function mount()
    {
        $this->setupNewEpisode();
    }

    public function setupNewEpisode()
    {
        $this->reset(['episode', 'datetime', 'file']);
        $this->episode = Episode::make();
        $this->episode->hidden = false; //false by default
        $this->datetime = now()->format('Y-m-d H:i');    //now by default
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
    }

    public function publish()
    {
        $this->validate();

        if ($this->podcast->isAuthor()) {

            DB::transaction(function () {
                $path = $this->file->store('episodes', 'public');
                $filename = Str::afterLast($path, "/");

                $this->episode->number = $this->podcast->getNextEpisodeNumber();
                $this->episode->podcast_id = $this->podcast->id;
                $this->episode->released_at = Carbon::parse($this->datetime);
                $this->episode->filename = $filename;
                $this->episode->save();

                $this->emit('episodesListUpdate');

                session()->flash('newEpisode', "#" . $this->episode->number . " " . $this->episode->title);
                $this->setupNewEpisode();
            });
        }
    }
}
