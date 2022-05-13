<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PodcastInfo extends Component
{
    public $podcast;

    protected $listeners = [
        'podcast-info-updated' => 'render'
    ];

    public function render()
    {
        return view('livewire.podcast-info');
    }
}
