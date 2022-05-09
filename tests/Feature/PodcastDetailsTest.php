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

    //Author view
    public function test_all_information_are_displayed()
    {
        $podcast = Podcast::first();

        $response = $this->actingAs($podcast->author)->get(route('podcasts.show', $podcast->id));

        //Make sure podcast info are present
        $response->assertSee($podcast->title);
        $response->assertSee("par " . $podcast->author->name);
        $response->assertSee($podcast->description);

        $this->assertNotEmpty($podcast->episodes);  //question: is it ok ? always true if seeder doesn't change

        //Make sure episodes info are present
        foreach ($podcast->episodes as $episode) {
            $response->assertSee("#" . $episode->number);
            $response->assertSee($episode->title);
            $response->assertSee($episode->description);
            $response->assertSee($episode->path);
            $response->assertSee("Publié le " . $episode->released_at->format("d.m.Y à H:i"));
            $response->assertSee("Créé le " . $episode->created_at->format("d.m.Y à H:i"));
        }
    }

    public function test_make_sure_icons_are_present()
    {
        //todo
    }

    public function test_release_date_in_futur_is_displayed_correctly()
    {
        //todo
    }
}