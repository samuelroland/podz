<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Livewire\Livewire;
use App\Models\Podcast;
use Illuminate\Support\Str;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PodcastUpdateTest extends TestCase
{
    public function test_podcast_details_page_contains_update_component()
    {
        $podcast = Podcast::first();

        $response = $this->actingAs(User::first())->get(route('podcasts.show', $podcast->id));

        $response->assertSeeLivewire('podcast-update');
    }

    public function test_podcast_details_page_doesnt_contain_update_component_as_visitor_and_as_non_author()
    {
        //As visitor
        $podcast = Podcast::first();

        $response = $this->get(route('podcasts.show', $podcast->id));

        $response->assertDontSeeLivewire('podcast-update');

        //As non author
        $podcast = Podcast::first();

        $response = $this->actingAs(User::factory()->create())->get(route('podcasts.show', $podcast->id));

        $response->assertDontSeeLivewire('podcast-update');
    }

    public function test_details_can_be_updated()
    {
        $podcast = Podcast::first();
        $author = $podcast->author;
        $this->actingAs($author);

        Livewire::test('podcast-update', ['podcast' => $podcast])
            ->assertSet('podcast', $podcast)
            ->assertSee("Enregistrer")
            ->set('podcast.title', "new title")
            ->set('podcast.description', "new description")
            ->call('update')
            ->assertHasNoErrors(['podcast.title', 'podcast.description']);

        $this->assertDatabaseHas('podcasts', ['title' => "new title", 'description' => 'new description']);
    }

    public function test_details_must_be_valid()
    {
        $podcast = Podcast::first();
        $author = $podcast->author;
        $this->actingAs($author);

        $response = Livewire::test('podcast-update', ['podcast' => $podcast])
            ->assertSet('podcast', $podcast)
            ->assertSee("Enregistrer")
            ->set('podcast.title', null)
            ->set('podcast.description', Str::random(2500))
            ->call('update')
            ->assertHasErrors(['podcast.title', 'podcast.description']);

        $response->set('podcast.title', Str::random(50))
            ->call('update')
            ->assertHasErrors(['podcast.title', 'podcast.description']);
    }
}
