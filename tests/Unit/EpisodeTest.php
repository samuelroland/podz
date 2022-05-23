<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Episode;
use App\Models\Podcast;

class EpisodeTest extends TestCase
{
    public function test_path_is_well_built()
    {
        $episode = Episode::factory()->create(['podcast_id' => Podcast::first()->id, 'number' => 30, 'filename' => "test.mp3"]);
        $this->assertEquals($episode->path, '/episodes/test.mp3');
    }
}
