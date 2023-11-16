<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Book;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Promotion>
 */
class PromotionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        return [
            'discount' => fake()->numberBetween(10,30 ),
            'start_date' => now(),
            'end_date' => now()->addDays(7),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
