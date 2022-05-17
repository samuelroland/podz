<x-app-layout>
    {{-- Podcast info section (title and description) --}}
    @livewire('podcast-info', ['podcast' => $podcast])

    <hr class="border-blue my-3">

    {{-- Episode creation section --}}
    @if(auth()->check() && $podcast->author->is(auth()->user()))
    @livewire('episode-creation', ['podcast' => $podcast])
    @endif

    {{-- Episodes section --}}
    <div>
        <h2>Episodes</h2>
        @livewire('episodes-list', ['episodes' => $podcast->episodes, 'podcast'=>$podcast])
    </div>
</x-app-layout>
