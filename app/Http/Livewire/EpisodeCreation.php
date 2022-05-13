<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\Episode;
use Livewire\Component;
use Livewire\WithFileUploads;

class EpisodeCreation extends Component
{
    use WithFileUploads;

    public $podcast;
    public $episode;
    public $datetime;   //bridge between episode.released_at and the view to manage format change
    public $file;

    protected $rules = [
        'episode.title' => '',
        'episode.hidden' => '',
        'datetime' => '',
        'episode.description' => '',
        'file' => ''
    ];

    public function mount()
    {
        $this->episode = new Episode();
    }

    public function render()
    {
        return view('livewire.episode-creation');
    }

    public function updatingDatetime()
    {
        $this->episode->released_at = Carbon::parse($this->datetime);
        //todo: fix this. not working.
    }

    public function publish()
    {
        $this->validate();

        //TODO: security validations of ownership
        $this->episode->number = 3; //$this->episode->getNextId();
        $this->episode->podcast_id = $this->podcast->id;
        $this->episode->released_at = now();    //temporary
        $this->episode->filename = "asdfasf";    //temporary
        $this->episode->save();
    }
}
