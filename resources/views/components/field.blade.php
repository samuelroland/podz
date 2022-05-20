@props(['label' => '', 'name', 'type' => 'text', 'cssOnField' => '', 'placeholder' => ''])
<div {{ $attributes->whereDoesntStartWith('wire:model')->merge(['class' => 'mt-3']) }}>
    @if($label != '')
    <label class="mb-1 block">{{ $label }}</label>
    @endif

    <div>
        @if($type == 'file')
        {{-- Progress bar code taken from the Livewire docs: https://laravel-livewire.com/docs/2.x/file-uploads#js-hooks --}}

        <div x-data="{ isUploading: false, progress: 0, failed: false }" x-on:livewire-upload-start="isUploading = true; uploadCompleted = false" x-on:livewire-upload-error="isUploading = false" x-on:livewire-upload-progress="progress = $event.detail.progress" x-on:livewire-upload-finish="uploadCompleted = true">
            @endif

            @if ($type != 'textarea')
            <input {{ $attributes->whereStartsWith('wire:model') }} placeholder="{{ $placeholder }}" type="{{ $type }}" value="{{ old($name) }}" class="{{ $cssOnField }} rounded-md px-1 border border-gray-400 {{ in_array($type, ['checkbox']) ? '' : 'h-8' }}" name="{{ $name }}" {{ $type=='file' ? '\@change="isUploading = false"' : '' }} />
            @else
            <textarea {{ $attributes->whereStartsWith('wire:model') }} placeholder="{{ $placeholder }}" type="{{ $type }}" class="{{ $cssOnField }} rounded-md border border-gray-400 p-1 w-full md:w-2/3 lg:w-1/2" name="{{ $name }}" rows="3">{{ old($name) }}</textarea>
            @endif

            @if($type == 'file')
            <!-- Progress Bar -->
            <div x-show="isUploading" x-cloak>
                Progression: <span class="text-green" x-text="uploadCompleted ? 'Téléversé!' : 'En cours'"></span>
                <span class="text-red-500" x-show="failed">Erreur...</span>
                <br><progress max="100" x-bind:value="progress" class="w-full"></progress>
            </div>
        </div>
        @endif

        @error($name)
        <div class="text-red-500 italic text-sm">
            {{ $message }}
        </div>
        @enderror
    </div>

</div>
