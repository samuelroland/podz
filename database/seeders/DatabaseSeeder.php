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
        //Delete all episodes files before creating new ones
        Storage::deleteDirectory('public/episodes');

        $testing = app()->environment('testing');   //during testing, we want very little data in comparison to local env

        User::factory($testing ? 1 : 3)->has(Podcast::factory($testing ? 1 : 3)->has(Episode::factory($testing ? 2 : 5)))->create();

        User::factory()->has(Podcast::factory($testing ? 1 : 2)->has(Episode::factory($testing ? 2 : 3)))->create(['name' => "sam", 'email' => 'sam@example.com', 'password' => bcrypt('password')]);
    }
}
