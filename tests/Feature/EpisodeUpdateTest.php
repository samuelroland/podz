<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Livewire\Livewire;
use App\Models\Episode;
use App\Models\Podcast;
use Illuminate\Support\Str;
use Illuminate\Http\Testing\File;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EpisodeUpdateTest extends TestCase
{
    public function test_podcast_details_page_uses_episode_update_component()
    {
        $podcast = Podcast::first();
        $author = $podcast->author;

        $response = $this->actingAs($author)->get(route('podcasts.show', $podcast->id));

        $response->assertSeeLivewire('episode-update');
    }

    public function test_podcast_details_page_doesnt_use_episode_update_if_not_author()
    {
        $podcast = Podcast::first();

        //Visitor
        $response = $this->get(route('podcasts.show', $podcast->id));

        $response->assertDontSeeLivewire('episode-update');

        //Non author
        $response = $this->actingAs(User::factory()->create())->get(route('podcasts.show', $podcast->id));

        $response->assertDontSeeLivewire('episode-update');
    }

    public function test_episode_update_works()
    {
        $user = User::first();
        $podcast = Podcast::factory()->create(['user_id' => $user->id]);
        $this->actingAs($user);
        $episode = Episode::factory()->create(['podcast_id' => $podcast->id]);
        $newEpisodeValues = Episode::factory()->create(['podcast_id' => $podcast->id]);

        Livewire::test('episode-update', ['episode' => $episode])
            ->set('episode.title', $newEpisodeValues->title)
            ->set('episode.description', $newEpisodeValues->description)
            ->set('episode.hidden', $newEpisodeValues->hidden)
            ->set('datetime', $newEpisodeValues->released_at)
            ->call('updateEpisode');

        $this->assertDatabaseHas('episodes', $newEpisodeValues->only(['title', 'description', 'hidden', 'released_at', 'podcast_id']));
    }

    public function test_data_are_correctly_validated()
    {
        $podcast = Podcast::first();
        $episode = $podcast->episodes->first();
        $author = $podcast->author;
        $this->actingAs($author);
        Storage::fake('public');

        $response = Livewire::test('episode-update', ['episode' => $episode])
            ->set('episode.title', '')
            ->set('episode.description', '   ')
            ->set('datetime', null)
            ->call('updateEpisode');

        $response->assertHasErrors(['episode.title', 'episode.description', 'datetime']);

        $response = Livewire::test('episode-update', ['episode' => $episode])
            ->set('episode.title', Str::random(70)) //above 60
            ->set('episode.description', Str::random(2500)) //above 2000
            ->set('datetime', 'not a datetime')
            ->call('updateEpisode');

        $response->assertHasErrors(['episode.title', 'episode.description', 'datetime']);
    }

    public function test_datetime_value_is_set_after_mount()
    {
        $podcast = Podcast::first();
        $episode = $podcast->episodes->first();
        $this->actingAs($podcast->author);
        $episode = $podcast->episodes->first();

        //Make sure datetime is set to the released_at value
        Livewire::test('episode-update', ['episode' => $episode])
            ->assertSet('datetime', $episode->released_at);
    }

    public function test_update_fails_silently_if_forbidden()
    {
        $user = User::first();
        $podcast = Podcast::factory()->create(['user_id' => $user->id]);
        $otherUser = User::factory()->create();
        $episode = Episode::factory()->create(['podcast_id' => $podcast->id]);

        $this->actingAs($otherUser);
        Livewire::test('episode-update', ['episode' => $episode])
            ->set('episode.title', "new title set as non author")
            ->call('updateEpisode');

        $this->assertDatabaseMissing('episodes', ['title' => 'new title set as non author']);
    }

    public function test_updating_title_to_another_episode_title_in_the_same_podcast_fails()
    {
        $user = User::first();
        $podcast = Podcast::factory()->create(['user_id' => $user->id]);
        $episode = Episode::factory()->create(['podcast_id' => $podcast->id, 'title' => 'great title']);
        $episode = Episode::factory()->create(['podcast_id' => $podcast->id]);

        $this->actingAs($user);
        $response = Livewire::test('episode-update', ['episode' => $episode])
            ->set('episode.title', 'great title')
            ->call('updateEpisode');

        $response->assertHasErrors(['episode.title' => 'unique']);
    }
}
