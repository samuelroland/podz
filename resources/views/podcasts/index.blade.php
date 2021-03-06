<x-app-layout>
    <div class="flex items-end">
        <div class="flex-1">
            <h1>Podcasts</h1>
            <p>Parcourez et découvrez tous les podcasts publiés sur Podz.</p>
        </div>
        @auth
        <div>
            <a href="{{ route('podcasts.create') }}"><button class="btn">Créer un podcast</button></a>
        </div>
        @endauth
    </div>
    <hr class="border-blue my-3">
    <div class="flex flex-wrap">
        @forelse($podcasts as $podcast)
        <a class="hover:bg-lightblue m-1 border border-blue rounded w-auto min-w-[] max-w-xs px-2 py-1" href="{{ route('podcasts.show', $podcast->id) }}">
            <div class="h-full">
                <h2>{{ $podcast->title }}</h2>
                <div class="flex">
                    <div class="flex-1 font-semibold mr-3">{{ $podcast->author->name }}</div>
                    <div class="text-green italic text-sm">{{ $podcast->publicEpisodes->count() . ' épisode' . ( $podcast->publicEpisodes->count() > 1 ? 's' : ' ') }}</div>
                </div>
                <div class="mt-1 text-sm italic text-gray-700 overflow-hidden text-ellipsis">{{ $podcast->summary }}</div>
            </div>
        </a>
        @empty
        <span class="text-info">Pas de podcasts publiés pour le moment...</span>
        @endforelse
    </div>
</x-app-layout>
