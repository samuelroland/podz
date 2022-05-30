@props(['episode', 'mode'])
<div>
    <div class="flex flex-wrap items-center">
        <span class="text-2xl mr-2 mt-3">{{ '#' . $episode->number }}</span>
        <x-field wire:model.lazy="episode.title" name="episode.title" placeholder="Titre de l'épisode"></x-field>
        <x-field wire:model="episode.hidden" name="episode.hidden" cssOnField="ml-2 block" label="Caché" class="flex items-center mx-2" type="checkbox"></x-field>
        <x-field wire:model.defer="datetime" name="datetime" type="datetime-local"></x-field>
    </div>

    <div>
        <x-field wire:model.lazy="episode.description" name="episode.description" type="textarea" placeholder="Description de l'épisode"></x-field>
    </div>

    @if($mode == 'create')
    <div class="flex items-center">
        <x-field wire:model="file" name="file" cssOnField="max-w-lg" label="Fichier audio (.mp3, .ogg ou .opus). Pas plus de 150MB." type="file"></x-field>
    </div>
    @endif

    @if($mode == 'update')
    <audio controls class="w-full my-2">
        <source src="{{ Storage::url($episode->path) }}" />
    </audio>

    @endif
</div>
