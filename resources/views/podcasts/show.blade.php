<x-app-layout>
    @livewire('podcast-info', ['podcast' => $podcast])

    <hr class="border-blue my-3">

    <div>
        <h2>Episodes</h2>

        <div class="flex flex-wrap">
            @forelse($podcast->episodes as $episode)
            <div class="border-l border-blue px-2 pl-3 my-5 w-full  {{ $episode->hidden ? 'opacity-75' : '' }}">
                <div class="flex w-full">
                    <h2 class="flex-1">{{ "#" . $episode->number }} {{ $episode->title }}</h2>
                    <div class="text-gray-600 italic flex items-center">
                        <span class="mr-3">Créé le {{ $episode->created_at->format('d.m.Y à H:i') }}</span>
                        <span class="mr-3">{{ $episode->released_at->isPast() ? 'Publié le' :  'Publication planifiée pour le' }} {{ $episode->released_at->format('d.m.Y à H:i') }}</span>
                        <span>
                            @if($episode->hidden)
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                            </svg>
                            @endif
                        </span>
                        <span>
                            @if(true)
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                            @endif
                        </span>
                    </div>
                </div>
                <div class="flex">
                    <div class="flex-1 font-semibold">{{ $podcast->author->name }}</div>
                </div>
                <div class="mt-1 text-sm italic text-gray-700 overflow-hidden text-ellipsis">{{ $episode->description }}</div>
                <audio controls class="w-full my-2">
                    <source src="{{ $episode->path }}" />
                </audio>
            </div>
            @empty
            <span class="text-info">Pas d'épisode dans ce podcast pour le moment.</span>
            <span>
                @if(true)
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
                @endif
            </span>
            @endforelse
        </div>
    </div>
</x-app-layout>
