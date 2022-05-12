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

        User::factory(3)->has(Podcast::factory(2)->has(Episode::factory(3)))->create();

        User::factory()->create(['name' => "sam", 'email' => 'sam@example.com', 'password' => bcrypt('password')]);
    }
}
