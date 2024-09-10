<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ChatSession>
 */
class ChatSessionFactory extends Factory
{
    protected $model= App\Models\ChatSession::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'message' => fake()->paragraph(2, true),
            'answer_id' => \App\Models\Answer::factory(),
            'therapist_id' => \App\Models\Therapist::factory(),
        ];
    }
}