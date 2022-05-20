<?php

namespace App\Http\Livewire;

use Livewire\Component;

class EpisodesList extends Component
{
    public $podcast;

    protected $listeners = [
        'episodesListUpdate' => 'refresh'
    ];

    public function render()
    {
        return view('livewire.episodes-list');
    }

    public function refresh()
    {
        $this->podcast->refresh();
    }
}
