<x-app-layout>
    <h1 class="flex-1">Créer un podcast</h1>
    <div>
        <form action="{{ route('podcasts.index') }}" method="POST">
            <x-field label="Title" placeholder="Rentrez un titre court et marquant." cc name="title"></x-field>
            <x-field label="Description" placeholder="De quoi parlera votre podcast ?" type="textarea" name="description"></x-field>
            @csrf
            <input type="submit" value="Créer" class="btn mt-1 ">
        </form>
    </div>

    <div class="whitespace-pre">
        ajskdflsjakldfésda
        asdf
        sad
    </div>
</x-app-layout>
