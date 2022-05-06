<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Podcast;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $users = User::factory(3)->has(Podcast::factory(rand(1, 3)))->create();
    }
}
