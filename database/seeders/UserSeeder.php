<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create some sample users
        User::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'age' => 30,
            'city' => 'New York',
        ]);

        User::create([
            'name' => 'Jane Smith',
            'email' => 'jane@example.com',
            'age' => 25,
            'city' => 'Los Angeles',
        ]);

        User::create([
            'name' => 'Mike Johnson',
            'email' => 'mike@example.com',
            'age' => 35,
            'city' => 'Chicago',
        ]);

        User::create([
            'name' => 'Sarah Wilson',
            'email' => 'sarah@example.com',
            'age' => 28,
            'city' => 'Houston',
        ]);

        User::create([
            'name' => 'David Brown',
            'email' => 'david@example.com',
            'age' => 32,
            'city' => 'Phoenix',
        ]);

        // Create additional users using the factory
        User::factory(10)->create([
            'age' => fake()->numberBetween(18, 65),
            'city' => fake()->city(),
        ]);
    }
}
