<div x-data="{newEpisodeOpen: true}" class="my-2">
    <h2 :class="{'cursor-pointer hover:underline': !newEpisodeOpen}" @click="newEpisodeOpen = true">Nouvel épisode <span x-show="!newEpisodeOpen">...</span></h2>
    <div x-show="newEpisodeOpen" class="border-l border-blue px-2 pl-3 my-5 w-full ">

        <div class="flex items-center">
            <span class="text-2xl mr-2 mt-3">{{ '#' . $episode->number }}</span>
            <x-field wire:model.lazy="episode.title" name="episode.title" placeholder="Titre de l'épisode"></x-field>
            <x-field wire:model="episode.hidden" name="episode.hidden" cssOnField="ml-2 block" label="Caché" class="flex items-center mx-2" type="checkbox"></x-field>
            <x-field wire:model.defer="datetime" name="datetime" type="datetime-local"></x-field>
        </div>

        <div>
            <x-field wire:model.lazy="episode.description" name="episode.description" type="textarea" placeholder="Description de l'épisode"></x-field>
        </div>

        <div class="flex items-center">
            <x-field wire:model="file" name="file" cssOnField="ml-3" label="Fichier audio (.mp3, .ogg ou .opus)" class="flex items-center" type="file"></x-field>
        </div>
        <div>
            <div class="flex">
                @if($file != null)
                <audio class="flex-1">
                    <source src="/episodes" />
                </audio>
                @endif
                <button class="btn" wire:click="publish()">Publier</button>
            </div>
        </div>
    </div>
</div>
