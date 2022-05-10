<?php

namespace Database\Factories;

use App\Models\Episode;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
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

        //Todo: Generate release date, and make sure an episode is always after the date of the last one

        $releaseDate = now()->subDays(rand(1, 50))->addMinutes(rand(60, 1000))->addHours(rand(1, 5))->addSeconds(rand(1, 45));
        return [
            'title' => $title,
            'description' => $this->faker->text(rand(20, 2000)),
            'number' => $this->number++,
            'hidden' => rand(0, 10) == 10 ? true : false,
            'released_at' => $releaseDate,
            'filename' => Str::random(50),
            'created_at' => rand(0, 1) == 0 ? $releaseDate : $releaseDate->subHours(rand(0, 12))
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Episode $episode) {
            Storage::disk('public')->delete("podcasts/" . $episode->path);  //delete just in case it already exists
            Storage::copy('testing/audio-sample.m4a', "public/" . $episode->path);
        });
    }
}
