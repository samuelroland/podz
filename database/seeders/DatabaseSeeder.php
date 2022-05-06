<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Podcast;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $users = User::factory(3)->has(Podcast::factory(2))->create();
    }
}
