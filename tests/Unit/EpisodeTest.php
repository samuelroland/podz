<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use App\Models\Episode;
use App\Models\Podcast;

class EpisodeTest extends TestCase
{
    //question: name and pieces
    public function test_get_next_number_method_works_well()
    {
        $user = User::factory()->create();
        $podcast = Podcast::factory()->create(['user_id' => $user->id]);
        $podcast2 = Podcast::factory()->create(['user_id' => $user->id]);

        //Make sure number is 5 after creating 4 episodes
        $episodes = Episode::factory(4)->create(['podcast_id' => $podcast->id]);

        $this->assertEquals(Episode::getNextNumber($podcast->id), 5);

        //Make sure this is really the maximum and not just based on a count
        $episodes = Episode::factory()->create(['podcast_id' => $podcast2->id, 'number' => 15]);

        $this->assertEquals(Episode::getNextNumber($podcast2->id), 16);
    }
}
