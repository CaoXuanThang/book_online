<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\MarketingBanner;
use App\Models\Promotion;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // $randomId = User::select('id')->inRandomOrder()->first()->id;

        return [
            'category_id' => fake()->numberBetween(1, 4),
            'brand_id' => fake()->numberBetween(1, 5),
            'name' => fake()->word,
            'image' => 'images/dien-thoai-iphone-11-pro-max-1.jpg',
            'price' => fake()->randomFloat(2, 100, 1000),
            'promotion_id' => fake()->numberBetween(1, 10),
            'quantity' => fake()->randomDigit,
            'description' => fake()->text,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
