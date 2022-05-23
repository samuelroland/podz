<div>
    <x-episode-form :episode="$episode" mode="update"></x-episode-form>

    <div class="mt-2 flex flex-wrap items-center space-x-1">
        <button class="btn" wire:click="updateEpisode()">Mettre à jour</button>
        <button class="btn" @click="confirm('Vous voulez vous vraiment supprimer cette épisode ?') ? $wire.deleteEpisode() : false">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
            </svg>
        </button>

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
