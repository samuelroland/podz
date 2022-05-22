<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Episode;
use App\Models\Podcast;

class PodcastDetailsTest extends TestCase
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
    public function test_all_information_are_displayed_for_the_author()
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
            $response->assertSee("Publié le " . $episode->released_at->format("d.m.Y à H:i."));
            $response->assertSee("Créé le " . $episode->created_at->format("d.m.Y à H:i."));
        }
    }

    public function test_a_message_is_displayed_when_no_episode_is_published()
    {
        $podcast = Podcast::factory()->create(['user_id' => User::first()->id]);

        $response = $this->get(route('podcasts.show', $podcast->id));

        $response->assertSee("Pas d'épisode dans ce podcast pour le moment.", false);
    }

    public function test_prefix_text_of_future_release_date_is_displayed_correctly_for_author()
    {
        $podcast = Podcast::factory()->create(['user_id' => User::first()->id]);
        $episode = Episode::factory()->create(['podcast_id' => $podcast->id, 'released_at' => now()->addDays(5)]);

        $response = $this->actingAs($podcast->author)->get(route('podcasts.show', $podcast->id));

        $response->assertSee("Publication planifiée pour le " . $episode->released_at->format("d.m.Y à H:i."));
    }

    public function test_release_date_displays_only_date_for_the_public()
    {
        $podcast = Podcast::factory()->create(['user_id' => User::first()->id]);
        $episode = Episode::factory()->create(['podcast_id' => $podcast->id]);

        //Non author
        $this->assertNotEmpty($podcast->episodes);
        $response = $this->actingAs(User::factory()->create())->get(route('podcasts.show', $podcast->id));
        $response->assertSee($episode->released_at->format("d.m.Y."));

        //Visitor
        $response = $this->get(route('podcasts.show', $podcast->id));
        $response->assertSee($episode->released_at->format("d.m.Y."));
    }

    public function test_future_episodes_are_not_publicly_visible()
    {
        $podcast = Podcast::factory()->create(['user_id' => User::first()->id]);
        $episode = Episode::factory()->create([
            'podcast_id' => $podcast->id,
            'released_at' => now()->addMinutes(3),
            'title' => "great test episode",
            'description' => "great test description",
        ]);

        //Non author
        $response = $this->actingAs(User::factory()->create())->get(route('podcasts.show', $podcast->id));
        $response->assertDontSee($episode->title);
        $response->assertDontSee($episode->description);

        //Visitor
        $response = $this->get(route('podcasts.show', $podcast->id));
        $response->assertDontSee($episode->title);
        $response->assertDontSee($episode->description);
    }

    public function test_past_hidden_episodes_are_nt_visible_for_the_public()
    {
        $podcast = Podcast::factory()->create(['user_id' => User::first()->id]);
        $episode = Episode::factory()->create([
            'podcast_id' => $podcast->id,
            'released_at' => now()->subDays(2),
            'hidden' => true,
            'title' => "great test episode",
            'description' => "great test description",
        ]);

        //Non author
        $response = $this->actingAs(User::factory()->create())->get(route('podcasts.show', $podcast->id));
        $response->assertDontSee($episode->title);
        $response->assertDontSee($episode->description);

        //Visitor
        $response = $this->get(route('podcasts.show', $podcast->id));
        $response->assertDontSee($episode->title);
        $response->assertDontSee($episode->description);
    }

    public function test_only_required_info_are_displayed_publicly()
    {
        $podcast = Podcast::factory()->create(['user_id' => User::first()->id]);
        $episode = Episode::factory()->create(['podcast_id' => $podcast->id]);

        //Non author
        $response = $this->actingAs(User::factory()->create())->get(route('podcasts.show', $podcast->id));

        $response->assertSee($episode->title);
        $response->assertSee($episode->description);
        $response->assertSee($episode->path);
        $response->assertSee("#" . $episode->number);
        $response->assertDontSee($episode->created_at->format('d.m.Y à H:i.'));
        $response->assertDontSee('Caché');
        $response->assertDontSee('Créé le');
        $response->assertDontSee('Publié le');
        $response->assertDontSee('Fichier audio');

        //Visitor
        $response = $this->get(route('podcasts.show', $podcast->id));

        $response->assertSee($episode->title);
        $response->assertSee($episode->description);
        $response->assertSee($episode->path);
        $response->assertSee("#" . $episode->number);
        $response->assertDontSee($episode->created_at->format('d.m.Y à H:i.'));
        $response->assertDontSee('Caché');
        $response->assertDontSee('Créé le');
        $response->assertDontSee('Publié le');
        $response->assertDontSee('Fichier audio');
    }
}
