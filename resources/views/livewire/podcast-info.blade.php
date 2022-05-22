<div>
    <div x-data="{ editing: false }">
        <div x-show="!editing">
            <div>
                <div class="flex">
                    <h1 class="flex-1">{{ $podcast->title }}</h1>
                    <span>
                        @if ($podcast->isAuthor())
                            <svg @click="editing = true" xmlns="http://www.w3.org/2000/svg"
                                class="cursor-pointer h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                        @endif
                    </span>
                </div>
            </div>
            <p class="text-green italic">par {{ $podcast->author->name }}</p>
            <p class="text-sm text-gray-700">{{ $podcast->description }}</p>
        </div>
        @if ($podcast->isAuthor())
            <div x-show="editing" x-cloak>
                @livewire('podcast-update', ['podcast' => $podcast])
            </div>
        @endif
    </div>
</div>
