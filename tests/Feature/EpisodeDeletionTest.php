<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Livewire\Livewire;
use App\Models\Episode;
use App\Models\Podcast;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EpisodeDeletionTest extends TestCase
{
    public function test_episode_deletion_works()
    {
        $podcast = Podcast::first();
        $author = $podcast->author;
        $episode = $podcast->episodes->first();
        $this->actingAs($author);

        Livewire::test('episode-update', ['episode' => $episode, 'podcast' => $podcast])
            ->call('deleteEpisode', [$episode->id]);

        $this->assertModelMissing($episode);
        $this->assertFalse(Storage::disk('public')->exists($episode->path));
    }

    public function test_episode_deletion_is_only_authorized_to_the_author()
    {
        //Case where the user is not the author
        $podcast = Podcast::first();
        $user = User::factory()->create();
        $episode = $podcast->episodes->first();
        $this->actingAs($user);

        Livewire::test('episode-update', ['episode' => $episode, 'podcast' => $podcast])
            ->call('deleteEpisode', [$episode->id]);

        $this->assertModelExists($episode);
        $this->assertTrue(Storage::disk('public')->exists($episode->path));


        //Case where the podcast is not linked to the episode (and the user is not the author)
        $podcast = Podcast::factory()->create(['user_id' => User::first()->id]);
        $user = User::factory()->create();
        $episode = Episode::first();
        $this->actingAs($user);

        Livewire::test('episode-update', ['episode' => $episode, 'podcast' => $podcast])
            ->call('deleteEpisode');

        $this->assertTrue(Storage::disk('public')->exists($episode->path));
        $this->assertModelExists($episode);
    }
}
