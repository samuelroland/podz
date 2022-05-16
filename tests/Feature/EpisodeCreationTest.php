<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Livewire\Livewire;
use App\Models\Episode;
use App\Models\Podcast;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;

class EpisodeCreationTest extends TestCase
{
    public function test_podcast_details_page_uses_episode_creation_component()
    {
        $podcast = Podcast::first();
        $author = $podcast->author;

        $response = $this->actingAs($author)->get(route('podcasts.show', $podcast->id));

        $response->assertSeeLivewire('episode-creation');
    }

    public function test_podcast_details_page_doesnt_use_episode_creation_as_non_author_or_visitor()
    {
        $podcast = Podcast::first();

        //Visitor
        $response = $this->get(route('podcasts.show', $podcast->id));

        $response->assertDontSeeLivewire('episode-creation');

        //Non author
        $response = $this->actingAs(User::factory()->create())->get(route('podcasts.show', $podcast->id));

        $response->assertDontSeeLivewire('episode-creation');
    }

    //Question: utile ?
    public function test_component_contains_required_texts()
    {
        $user = User::first();
        $podcast = Podcast::factory()->create(['user_id' => $user->id]);
        Episode::factory(3)->create(['podcast_id' => $podcast->id]);

        $response = Livewire::test('episode-creation', ['podcast' => $podcast]);
        $response->assertSee('Nouvel épisode');
        $response->assertSee('Caché');
        $response->assertSee('Publier');
        $response->assertSee('Fichier audio (.mp3, .ogg ou .opus)');
        $response->assertSee("#" . 4);
    }

    public function test_episode_creation_works()
    {
        $user = User::first();
        $podcast = Podcast::factory()->create(['user_id' => $user->id]);
        $this->actingAs($user);
        $episode = Episode::factory()->make(['podcast_id' => $podcast->id]);
        Storage::fake('public');
        $fakeFile = UploadedFile::fake()->create('audio.mp3');

        Livewire::test('episode-creation', ['podcast' => $podcast])
            ->set('episode.title', $episode->title)
            ->set('episode.description', $episode->description)
            ->set('episode.hidden', $episode->hidden)
            ->set('datetime', $episode->released_at)
            ->set('file', $fakeFile)
            ->call('publish');

        //Make sure the episode is in the database
        $this->assertDatabaseHas('episodes', $episode->only(['title', 'description', 'hidden', 'released_at', 'podcast_id']));

        //Make sure file is present on disk
        $finalEpisode = $podcast->episodes()->first();
        Storage::disk('public')->assertExists('episodes/' . $finalEpisode->filename);
    }

    public function test_data_are_correctly_validated()
    {
        $podcast = Podcast::first();
        $author = $podcast->author;
        $this->actingAs($author);
        Storage::fake('public');

        $response = Livewire::test('episode-creation', ['podcast' => $podcast])
            ->set('episode.title', '')
            ->set('episode.description', '   ')
            ->set('datetime', null)
            ->call('publish');

        $response->assertHasErrors(['episode.title', 'episode.description', 'datetime']);

        $response = Livewire::test('episode-creation', ['podcast' => $podcast])
            ->set('episode.title', Str::random(70)) //above 60
            ->set('episode.description', Str::random(2500)) //above 2000
            ->set('datetime', 'not a datetime')
            ->set('file', UploadedFile::fake()->create('audio.m4a', 10))
            ->call('publish');

        $response->assertHasErrors(['episode.title', 'episode.description', 'datetime', 'file']);
    }

    //TODO: reformat the test
    public function test_audio_file_is_validated()
    {
        $podcast = Podcast::first();
        $author = $podcast->author;
        $this->actingAs($author);
        Storage::fake('public');

        //Valid MIME types
        //MP3
        $response = Livewire::test('episode-creation', ['podcast' => $podcast])
            ->set('file', UploadedFile::fake()->create('audio.mp3', 20, 'audio/mpeg'))
            ->call('publish');
        $response->assertHasNoErrors(['file']);
        //OGG
        $response = Livewire::test('episode-creation', ['podcast' => $podcast])
            ->set('file', UploadedFile::fake()->create('audio.ogg', 10, 'audio/ogg'))
            ->call('publish');
        $response->assertHasNoErrors(['file']);
        //OPUS
        $response = Livewire::test('episode-creation', ['podcast' => $podcast])
            ->set('file', UploadedFile::fake()->create('audio.opus', 10, 'audio/opus'))
            ->call('publish');
        $response->assertHasNoErrors(['file']);

        //A few invalid MIME types
        //FLAC
        $response = Livewire::test('episode-creation', ['podcast' => $podcast])
            ->set('file', UploadedFile::fake()->create('audio.flac', 10, 'audio/flac'))
            ->call('publish');
        $response->assertHasErrors(['file']);
        //PDF
        $response = Livewire::test('episode-creation', ['podcast' => $podcast])
            ->set('file', UploadedFile::fake()->create('document.pdf', 10, 'application/pdf'))
            ->call('publish');
        $response->assertHasErrors(['file']);

        //Maximum size
        // $response = Livewire::test('episode-creation', ['podcast' => $podcast])
        //     ->set('file', UploadedFile::fake()->create('audio.mp3', 1500, 'audio/mpeg'))
        //     ->call('publish');
        // $response->assertHasErrors(['file']);
        //TODO
    }

    public function test_default_value_of_the_episode_are_set()
    {
        $user = User::first();
        $podcast = Podcast::factory()->create(['user_id' => $user->id]);
        $this->actingAs($user);
        Episode::factory(2)->create(['podcast_id' => $podcast->id]);
        $episode = Episode::factory()->make(['podcast_id' => $podcast->id]);

        //Make sure hidden and number are set
        $response = Livewire::test('episode-creation', ['podcast' => $podcast])
            ->assertSet('episode.hidden', false, true)
            ->assertSet('episode.number', 3, true);
    }

    public function test_publishing_fails_silently_as_non_author_of_the_podcast()
    {
        $user = User::first();
        $podcast = Podcast::factory()->create(['user_id' => $user->id]);
        $otherUser = User::factory()->create();
        $episode = Episode::factory()->make(['podcast_id' => $podcast->id]);

        $this->actingAs($otherUser);
        Livewire::test('episode-creation', ['podcast' => $podcast])
            ->set('episode.title', $episode->title)
            ->set('episode.description', $episode->description)
            ->set('episode.hidden', $episode->hidden)
            ->set('datetime', $episode->released_at)
            ->call('publish');

        $this->assertDatabaseMissing('episodes', $episode->only(['title', 'description', 'hidden', 'released_at', 'podcast_id']));
        $this->assertTrue(Storage::disk('public')->missing('episodes/' . $episode->filename));
    }
}
