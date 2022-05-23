<div>
    <x-episode-form :episode="$episode" mode="update"></x-episode-form>

    <div class="mt-2">
        <button class="btn" wire:click="updateEpisode()">Mettre à jour</button>

        <div x-data>
            @if(session()->has('updatedEpisode-' . $episode->id))
            <button @click="edition = false; $wire.emit('episodesListUpdate')" class="btn mt-1">Fermer</button>

            <span class="text-green">
                L'épisode '{{ session('updatedEpisode-' . $episode->id) }}' a bien été mis à jour.
            </span>
            @endif
        </div>
    </div>
</div>
