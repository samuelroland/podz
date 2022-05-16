<div x-data="{newEpisodeOpen: true}" class="my-2">
    <h2 :class="{'cursor-pointer hover:underline': !newEpisodeOpen}" @click="newEpisodeOpen = true">Nouvel épisode <span x-show="!newEpisodeOpen">...</span></h2>
    <div x-show="newEpisodeOpen" class="border-l border-blue px-2 pl-3 my-5 w-full ">

        <div class="flex items-center">
            <span class="text-2xl mr-2 mt-3">{{ '#' . 4 /*$episode->getNextNumber()*/ }}</span>
            <x-field wire:model.lazy="episode.title" name="episode.title" placeholder="Titre de l'épisode"></x-field>
            <x-field wire:model="episode.hidden" name="episode.hidden" cssOnField="ml-2 block" label="Caché" class="flex mx-2" type="checkbox"></x-field>
            <x-field wire:model.defer="datetime" name="datetime" type="datetime-local" class="flex"></x-field>
        </div>

        <div>
            <x-field wire:model.lazy="episode.description" name="episode.description" label="" class="flex" type="textarea" placeholder="Description de l'épisode"></x-field>
        </div>

        <div class="flex items-center">
            <x-field wire:model.lazy="file" name="file" cssOnField="ml-3 w-28" label="Fichier audio (.mp3, .ogg ou .opus)" class="flex items-center" type="file"></x-field>
            <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 border border-gray-500 p-1 rounded-full h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z" />
            </svg>
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
