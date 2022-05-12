<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PodcastCreationTest extends TestCase
{
    public function test_create_a_podcast_page_exists()
    {
        $response = $this->actingAs(User::first())->get(route('podcasts.create'));

        $response->assertStatus(200);
    }

    public function test_create_a_podcast_page_is_guarded()
    {
        $response = $this->get(route('podcasts.create'));

        $response->assertRedirect(route('login'));
    }

    public function test_store_route_is_guarded()
    {
        $response = $this->get(route('podcasts.create'));

        $response->assertRedirect(route('login'));
    }

    public function test_podcast_creation_works()
    {
        $actor = User::factory()->create();
        $data = [
            'title' => 'Great podcast',
            'description' => 'Great short description'
        ];

        $response = $this->actingAs($actor)->post(route('podcasts.store'), $data);
        $response->assertRedirect(route('podcasts.index'));
        $response->assertSessionHasNoErrors();

        //make sure the podcast has been created and the author and info are set correctly
        $data['user_id'] = $actor->id;
        $this->assertDatabaseHas('podcasts', $data);
    }

    public function test_podcast_is_not_created_on_invalid_request()
    {
        $actor = User::factory()->create();
        $data = [
            'title' => 'Great podcast with a very very very very very very very very long title',
            'description' => null
        ];

        $response = $this->actingAs($actor)->post(route('podcasts.store'), $data);

        $response->assertSessionHasErrors(['title', 'description']);
        $this->assertDatabaseMissing('podcasts', $data);

        $data = [
            'description' => Str::random(2500)
        ];

        $response = $this->actingAs($actor)->post(route('podcasts.store'), $data);

        $response->assertSessionHasErrors(['title', 'description']);
        $this->assertDatabaseMissing('podcasts', $data);
    }

    public function test_new_podcast_button_is_present()
    {
        $actor = User::factory()->create();
        $response = $this->actingAs($actor)->get(route('podcasts.index'));

        $response->assertSee("Créer un podcast");
    }

    public function test_new_podcast_button_doesnt_exist_as_visitor()
    {
        $response = $this->get(route('podcasts.index'));

        $response->assertDontSee("Créer un podcast");
    }
}
