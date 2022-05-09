<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Episode>
 */
class EpisodeFactory extends Factory
{
    private $number = 1;
    private $onlyPlannedEpisodes = false;

    public function definition()
    {
        $title = $this->faker->text(36);    //35 + a dot (that will be removed)
        $title = Str::substr($title, 0, Str::length($title) - 1);   //remove the last "." at the end

        //Generate release date, and make sure if an episode 

        return [
            'title' => $title,
            'description' => $this->faker->text(rand(20, 2000)),
            'number' => $this->number++,
            'hidden' => rand(0, 10) == 10 ? true : false,
            'released_at' => now()->subDays(rand(1, 50)),
            'filename' => Str::random(50),
        ];
    }
}
