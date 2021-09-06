<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        \App\Models\Game::factory(3)->create();
        \App\Models\Type::factory(3)->create();
        \App\Models\Condition::factory(3)->create();
        // \App\Models\message::factory(10)->create();
        // \App\Models\Post::factory(10)->create();
    }
}
