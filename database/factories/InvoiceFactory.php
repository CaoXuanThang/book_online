<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoice>
 */
class InvoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // get random user id, user inoder
        return [
            'user_id' => fake()->numberBetween(1, 10),
            'total_amount' => fake()->randomFloat(2, 100, 10000),
            'name' => fake()->name,
            'address' => fake()->address,
            'phone' => fake()->phoneNumber,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
