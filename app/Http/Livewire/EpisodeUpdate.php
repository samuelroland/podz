<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\Episode;
use Livewire\Component;
use Illuminate\Validation\Rule;

class EpisodeUpdate extends Component
{
    public $podcast;
    public $episode;
    public $datetime;   //bridge between episode.released_at and the view to manage format change

    //As the rules are dynamically generated (contains an ID here), we need to wrap them in this function instead of $rules
    protected function rules()
    {
        return [
            'episode.title' => [
                'required',
                'max:60',
                Rule::unique(with(new Episode)->getTable(), 'title')->where(fn ($query) => $query->where('podcast_id', $this->podcast->id))->ignore($this->episode->id),
            ],
            'episode.description' => 'required|max:2000',
            'episode.hidden' => 'boolean',
            'datetime' => 'required|date',
        ];
    }

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

    public function updateEpisode()
    {
        $this->validate();

        if ($this->podcast->isAuthor()) {
            $this->episode->released_at = Carbon::parse($this->datetime);

            $this->episode->save();

            $this->emit('episodesListUpdate');

            session()->flash('updatedEpisode', "#" . $this->episode->number . " " . $this->episode->title);
        }
    }
}
