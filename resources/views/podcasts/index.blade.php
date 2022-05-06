<x-app-layout>
    <h1>Podcasts</h1>
    <h3>Parcourez et découvrez tous les podcasts publiés sur Podz.</h3>

    <div class="flex">
        @foreach($podcasts as $podcast)
        <div class="border">
            <div>{{ $podcast->title }}</div>
            <div class="flex">
                <div class="flex-1">{{ $podcast->author->name }}</div>
                <div>{{ $podcast->episodes->count() }}</div>
            </div>
            <div class="h-10 overflow-ellipsis">
                <div>{{ $podcast->description }}</div>
            </div>
        </div>
        @endforeach
    </div>
</x-app-layout>
