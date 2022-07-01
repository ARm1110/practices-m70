<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\City;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        \App\Models\City::factory(20)->create();

        \App\Models\User::factory(20)
            ->has(City::factory()->count(3))
            ->create();
        Category::factory(1)
            ->has(User::factory()->count(3))
            ->create();
    }
}
