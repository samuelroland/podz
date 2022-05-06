<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Podcast;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PodcastsTest extends TestCase
{
    public function test_podcasts_page_exists()
    {
        $response = $this->get(route('podcasts.index'));

        $response->assertStatus(200);
    }

    public function test_the_page_has_title_and_description()
    {
        $response = $this->get(route('podcasts.index'));

        $response->assertSee("Podcasts");
        $response->assertSee("Parcourez et découvrez tous les podcasts publiés sur Podz.");
    }

    public function test_all_podcasts_are_displayed_with_their_data()
    {
        $podcasts = Podcast::all();

        $response = $this->get(route('podcasts.index'));

        foreach ($podcasts as $podcast) {
            $response->assertSee($podcast->title);
            $response->assertSee($podcast->summary); //this will not match the description as it contains 3 dots when necessary
            $response->assertSee($podcast->author->name);
            $response->assertSee($podcast->episodes->count() . " épisode" .  ($podcast->episodes->count() > 1 ? 's' : ''));
        }
    }
}
