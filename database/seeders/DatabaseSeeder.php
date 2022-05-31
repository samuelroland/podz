<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Episode;
use App\Models\Podcast;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $testing = app()->environment('testing');   //during testing, we want very little data in comparison to local env

        //Delete all episodes files before creating new ones
        $testing ? null : Storage::deleteDirectory('public/episodes');

        User::factory($testing ? 1 : 3)->has(Podcast::factory($testing ? 1 : 3)->has(Episode::factory($testing ? 2 : 5)))->create();

        User::factory()->has(Podcast::factory($testing ? 1 : 2)->has(Episode::factory($testing ? 2 : 3)))->create(['name' => "sam", 'email' => 'sam@example.com', 'password' => bcrypt('password')]);
    }
}
