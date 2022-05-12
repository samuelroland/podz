<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PodcastUpdate extends Component
{
    public $podcast;

    protected $rules = [
        'podcast.title' => 'required|max:35',
        'podcast.description' => 'required|max:2000',
    ];

    public function render()
    {
        return view('livewire.podcast-update');
    }

    public function update()
    {
        $this->validate();

        $this->podcast->save();

        session()->flash("podcastUpdated", "Le podcast a bien été mis à jour.");
    }
}
