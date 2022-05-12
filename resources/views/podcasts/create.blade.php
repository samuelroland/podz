<x-app-layout>
    <h1 class="flex-1">Créer un podcast</h1>
    <div>
        <form action="{{ route('podcasts.index') }}" method="POST">
            <x-field label="Title" name="title"></x-field>
            <x-field label="Description" type="textarea" name="description"></x-field>
            @csrf
            <input type="submit" value="Créer" class="btn mt-1 ">
        </form>
    </div>
</x-app-layout>
