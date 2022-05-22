<?php

namespace App\Http\Livewire;

use Livewire\Component;

class EpisodeUpdate extends Component
{
    public $episode;
    public $datetime;   //bridge between episode.released_at and the view to manage format change

    public function render()
    {
        return view('livewire.episode-update');
    }

    public function mount()
    {
        $this->datetime = $this->episode->released_at;
    }

    public function updated($field)
    {
        $this->validateOnly($field);
    }
}
