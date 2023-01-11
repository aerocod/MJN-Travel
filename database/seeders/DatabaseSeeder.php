<?php

namespace Database\Seeders;
use App\Models\User;
use App\Models\Category;
use App\Models\Checkout;
use App\Models\Destination;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        User::create(
            [
                "name" => "Michael",
                "username" => "michael",
                "email" => "michael@gmail.com",
                "password" => bcrypt("password"),
                "is_admin" => 1
            ]);
        User::factory(5)->create();
        Category::create(
            [
                "name" => "Bali",
                "slug" => "bali"
            ]);
        Category::create(
            [
                "name" => "Italy",
                "slug" => "italy"
            ]);
        Category::create(
            [
                "name" => "Rome",
                "slug" => "rome"
            ]);
        Category::create(
            [
                "name" => "Mexico",
                "slug" => "mexico"
            ]);
        Category::create(
            [
                "name" => "Africa",
                "slug" => "africa"
            ]);
        //Category::factory(8)->create();
        Destination::factory(100)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
