<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->unique()->words(3, true);

        return [
            "name" => $name,
            "description" => $this->faker->sentences(4, true),
            "slug" => Str::slug($name),
            "price" => $this->faker->randomFloat(2, 1, 50),
            "old_price" => $this->faker->randomFloat(2, 1, 50),
            "top_category_id" => $this->faker->numberBetween(1, 5),
            "mid_category_id" => $this->faker->numberBetween(1, 7),
            "end_category_id" => $this->faker->numberBetween(1, 16),
            "color_id" => $this->faker->numberBetween(1, 30),
            "size_id" => $this->faker->numberBetween(1, 47),
            "isOffered" => $this->faker->boolean(10),
            "price_offered" => $this->faker->randomFloat(2, 1, 50),
            "active" => $this->faker->boolean(90),
        ];
    }
}
