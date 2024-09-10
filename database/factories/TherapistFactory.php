<?php

namespace Database\Factories;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Therapist>
 */
class TherapistFactory extends Factory
{
    protected $model= App\Models\Therapist::class;
    protected static ?string $password;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'password' => static::$password ??= Hash::make('password'),
            'age' => random_int(20, 80),
            'address' => fake()->name(), 
            'gender' => 'male',
            'specialists' => fake()->name(),
            'degree' => 'Psychologist',
            'university' => fake()->name(),
        ];
    }
}
