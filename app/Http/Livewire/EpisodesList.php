<?php

namespace App\Http\Livewire;

use Livewire\Component;

class EpisodesList extends Component
{
    public $podcast;

    protected $listeners = [
        'episodesListUpdate' => 'render'    //calling render with rehydrate $podcast so episodes list will be up-to-date
    ];

    public function render()
    {
        return view('livewire.episodes-list');
    }
}
