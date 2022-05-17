<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use App\Models\Episode;
use App\Models\Podcast;
use Illuminate\Support\Str;

class PodcastTest extends TestCase
{
    public function test_podcasts_summary_is_correctly_extracted()
    {
        $description = "Et rerum et consequatur quae aliquid voluptate vel. Sequi aut eum perspiciatis reprehenderit soluta fugiat. Qui necessitatibus fuga sit illum quia. Qui necessitatibus fuga sit illum quia. ";
        $podcast = Podcast::factory()->create(['description' => $description, 'user_id' => User::first()->id]);
        $limit = 150;

        $this->assertTrue(Str::length($podcast->summary) <= $limit + 3);    //cuts at 150 and add 3 dots.
        $this->assertEquals(Str::substr($podcast->summary, Str::length($podcast->summary) - 3), '...');    //3 dots are added added at the end
    }

    public function test_podcasts_summary_doesnt_extract_when_description_length_is_already_good()
    {
        $description = "Et rerum et consequatur quae aliquid voluptate vel. Sequi aut eum perspiciatis reprehenderit soluta fugiat!!!!";
        $podcast = Podcast::factory()->create(['description' => $description, 'user_id' => User::first()->id]);

        $this->assertEquals($podcast->summary, $podcast->description);
    }

    public function test_get_next_number_really_gives_next_number()
    {
        $user = User::factory()->create();
        $podcast = Podcast::factory()->create(['user_id' => $user->id]);
        $podcast2 = Podcast::factory()->create(['user_id' => $user->id]);

        //Make sure is 1 when there is no episode
        $this->assertEquals($podcast->getNextEpisodeNumber(), 1);

        //Make sure number is 5 after creating 4 episodes
        $episodes = Episode::factory(4)->create(['podcast_id' => $podcast->id]);

        $this->assertEquals($podcast->getNextEpisodeNumber(), 5);

        //Make sure this is really the maximum and not just based on a count
        $episodes = Episode::factory()->create(['podcast_id' => $podcast2->id, 'number' => 15]);

        $this->assertEquals($podcast2->getNextEpisodeNumber(), 16);
    }
}
