<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

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
        return [
            //
            'name'          => ucfirst($this->faker->word),
            'category_id'   => Category::inRandomOrder()->first()?-> id ?? Category::factory(),
            'price'         => $this->faker->randomFloat(2,1,500),
            'description'   =>$this->faker->sentence(10),
        ];
    }
}
