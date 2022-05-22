<div>
    <x-episode-form :episode="$episode" mode="update"></x-episode-form>
    
    <div class="mt-2">
        <button class="btn" wire:click="updateEpisode()" @click="edition = false">Mettre à jour</button>
        @if(session()->has('updatedEpisode'))
        <span class="text-green">
            L'épisode '{{ session('updatedEpisode') }}' a bien été mis à jour.
        </span>
        @endif
    </div>
</div>