<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Post::factory(30)->create();
        // User::factory(5)->create();

        // User::factory()->create([
        //     'first_name' => 'alex',
        //     'last_name' => 'murphy',
        //     'username' => 'murphy_dev',
        //     'email' => 'murphy@example.com',
        //     'phone_number' => '09120000000',
        //     'password' => bcrypt('password123'),
        // ]);
    }
}
