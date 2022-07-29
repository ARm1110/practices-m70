<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\City;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
        DB::table('users')->insert([
            'firstName' => 'amir',
            'lastName' => 'rajabali',
            'email' => 'amirrajabali1999@gmail.com',
            'role' => 'admin',
            'phone' => '0999999999',
            'city_id' => rand(1, 5),
            'is_active' => 1,
            'password' => Hash::make('12345678'),
        ]);
        DB::table('users')->insert([
            'firstName' => 'shopper',
            'lastName' => 'test',
            'email' => 'shopper123@gmail.com',
            'role' => 'shopper',
            'phone' => '0999999999',
            'city_id' => rand(1, 5),
            'is_active' => 1,
            'password' => Hash::make('12345678'),
        ]);
        DB::table('users')->insert([
            'firstName' => 'user',
            'lastName' => 'test',
            'email' => 'user123@gmail.com',
            'role' => 'user',
            'phone' => '0999999999',
            'city_id' => rand(1, 5),
            'is_active' => 1,
            'password' => Hash::make('12345678'),
        ]);
        \App\Models\User::factory(20)
            ->has(City::factory()->count(3))
            ->create();
        Category::factory(1)
            ->has(User::factory()->count(3))
            ->create();
    }
}
