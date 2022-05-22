<x-app-layout>
    {{-- Podcast info section (title and description) --}}
    @livewire('podcast-info', ['podcast' => $podcast])

    <hr class="border-blue my-3">

    {{-- Episode creation section --}}
    @if ($podcast->isAuthor())
        @livewire('episode-creation', ['podcast' => $podcast])
    @endif

    {{-- Episodes section --}}
    <div>
        <h2>Episodes</h2>
        @livewire('episodes-list', ['podcast' => $podcast])
    </div>
</x-app-layout>
