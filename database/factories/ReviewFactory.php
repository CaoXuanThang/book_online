<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'book_id' => fake()->numberBetween(1, 9),
            'user_id' => fake()->numberBetween(1, 10),
            'comment' => fake()->text(100),
            'rating' => fake()->numberBetween(1, 5),
        ];
    }
}
