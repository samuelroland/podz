<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Podcast>
 */
class PodcastFactory extends Factory
{
    use WithFaker;

    public function definition()
    {
        $title = $this->faker->text(35);
        $title = Str::substr($title, 0, Str::length($title) - 1);   //remove the last "." at the end
        return [
            'title' => $title,
            'description' => $this->faker->text(rand(30, 2000))
        ];
    }
}
