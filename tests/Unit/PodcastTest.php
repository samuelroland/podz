<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
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
}
