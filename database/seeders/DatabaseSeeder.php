<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'age' => 20,
            'gender' => 'female',
            'country' => 'Myanmar',
            'degree' => 'Psychologist',
            'experience' => 7,
            'password' => Hash::make(env('ADMIN_PASSWORD')),
        ]);
    }
}
