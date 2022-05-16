<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Livewire\Livewire;
use App\Models\Episode;
use App\Models\Podcast;
use Illuminate\Support\Str;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

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
        $podcast = Podcast::first();
        $author = $podcast->author;
        $this->actingAs($author);
        $episode = Episode::factory()->make(['podcast_id' => $podcast->id]);

        Livewire::test('episode-creation', ['podcast' => $podcast])
            ->set('episode.title', $episode->title)
            ->set('episode.description', $episode->description)
            ->set('episode.hidden', $episode->hidden)
            ->set('datetime', $episode->released_at)
            ->call('publish');

        $this->assertDatabaseHas('episodes', $episode->only(['title', 'description', 'hidden', 'released_at', 'podcast_id']));
    }

    public function test_data_are_correctly_validated()
    {
        $podcast = Podcast::first();
        $author = $podcast->author;
        $this->actingAs($author);

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
            ->call('publish');

        $response->assertHasErrors(['episode.title', 'episode.description', 'datetime']);
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

    //todo: test episode->getNextId()

    //todo: tests for data validation and security validation
}
