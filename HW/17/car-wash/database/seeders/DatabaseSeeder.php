<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\Service;
use App\Models\Station;
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
        \App\Models\User::factory(10)->create();
        \App\Models\Station::factory(10)->create();
        \App\Models\Service::factory(10)->create();
        Booking::factory(10)
            ->has(User::factory()->count(3))
            ->has(Station::factory()->count(3))
            ->has(Service::factory()->count(3))
            ->create();


        // Category::factory(10)->hasAttached(
        //     Task::all()->random(3)
        //     )->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
