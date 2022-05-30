<div x-data="{newEpisodeOpen: false}" class="my-2">
    <h2 :class="{'cursor-pointer hover:underline': !newEpisodeOpen}" @click="newEpisodeOpen = true">Nouvel épisode <span x-show="!newEpisodeOpen">...</span></h2>
    <div x-show="newEpisodeOpen" class="border-l border-blue px-2 pl-3 my-5 w-full " x-cloak>

        <x-episode-form :episode="$episode" mode="create"></x-episode-form>

        <div class="mt-2">
            <button class="btn" wire:click="publish()">Sauver</button>
            @if(session()->has('newEpisode'))
            <span class="text-green">
                L'épisode '{{ session('newEpisode') }}' a bien été publié.
            </span>
            @endif
        </div>
    </div>
</div>
