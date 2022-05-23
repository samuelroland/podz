<div>
    <x-field wire:keyup.enter="update" placeholder="Rentrez un titre court et marquant." label="Title" name="podcast.title" wire:model.lazy="podcast.title"></x-field>
    <x-field label="Description" placeholder="De quoi parlera votre podcast ?" type="textarea" name="podcast.description" wire:model.lazy="podcast.description">
    </x-field>
    @csrf
    <button wire:click.prevent="update" class="btn mt-1">Enregistrer</button>
    @if(session()->has('podcastUpdated'))
    <button @click="editing = false" wire:click="$emit('podcast-info-updated')" class="btn mt-1">Fermer</button>
    <span class="text-info">{{ session('podcastUpdated') }}</span>
    @endif
</div>
