<?php

namespace Tests\Feature;

use App\Models\Episode;
use Tests\TestCase;
use App\Models\User;
use App\Models\Podcast;

class PodcastsDetailsTest extends TestCase
{
    public function test_podcasts_details_page_exists()
    {
        $response = $this->get(route('podcasts.show', Podcast::first()->id));

        $response->assertStatus(200);
    }

    public function test_podcast_info_component_is_included_in_the_page()
    {
        $response = $this->get(route('podcasts.show', Podcast::first()->id));

        $response->assertSeeLivewire('podcast-info');
    }

    //Author view
    public function test_all_information_are_displayed()
    {
        $podcast = Podcast::first();

        $response = $this->actingAs($podcast->author)->get(route('podcasts.show', $podcast->id));

        //Make sure podcast info are present
        $response->assertSee($podcast->title);
        $response->assertSee("par " . $podcast->author->name);
        $response->assertSee($podcast->description);

        $this->assertNotEmpty($podcast->episodes);

        //Make sure episodes info are present
        foreach ($podcast->episodes as $episode) {
            $response->assertSee("#" . $episode->number);
            $response->assertSee($episode->title);
            $response->assertSee($episode->description);
            $response->assertSee($episode->path);   //present in <audio>
            $response->assertSee("Publié le " . $episode->released_at->format("d.m.Y à H:i"));
            $response->assertSee("Créé le " . $episode->created_at->format("d.m.Y à H:i"));
        }
    }

    public function test_a_message_is_displayed_when_no_episode_is_published()
    {
        $podcast = Podcast::factory()->create(['user_id' => User::first()->id]);

        $response = $this->actingAs($podcast->author)->get(route('podcasts.show', $podcast->id));

        $response->assertSee("Pas d'épisode dans ce podcast pour le moment.", false);
    }

    public function test_release_date_in_futur_is_displayed_correctly()
    {
        $podcast = Podcast::factory()->create(['user_id' => User::first()->id]);
        $episode = Episode::factory()->create(['podcast_id' => $podcast->id, 'released_at' => now()->addDays(5)]);

        $response = $this->actingAs($podcast->author)->get(route('podcasts.show', $podcast->id));

        $response->assertSee("Publication planifiée pour le " . $episode->released_at->format("d.m.Y à H:i"));
    }
}
