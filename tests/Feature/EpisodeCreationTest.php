<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Podcast;
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
}
