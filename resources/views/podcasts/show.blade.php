<x-app-layout>
    <h1>{{ $podcast->title }}</h1>
    <p class="text-green italic">par {{ $podcast->author->name }}</p>
    <p class="text-sm text-gray-700">{{ $podcast->description }}</p>

    <hr class="border-blue my-3">

    <div>
        <h2>Episodes</h2>

        <div class="flex flex-wrap">
            @foreach($podcast->episodes as $episode)
            <div class="border-l border-blue p-2 pl-3 my-2">
                <div class="flex">
                    <h2 class="flex-1">{{ "#" . $episode->number }} {{ $episode->title }}</h2>
                    <div>
                        <span class="mr-3">Créé le {{ $episode->created_at->format('d.m.Y à H:i') }}</span>
                        <span class="mr-3">Publié le {{ $episode->released_at->format('d.m.Y à H:i') }}</span>
                    </div>
                </div>
                <div class="flex">
                    <div class="flex-1 font-semibold">{{ $podcast->author->name }}</div>
                </div>
                <div class="mt-1 text-sm italic text-gray-700 overflow-hidden text-ellipsis">{{ $episode->description }}</div>
                <audio src="{{ $episode->path }}"></audio>
            </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
