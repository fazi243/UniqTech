<?php

namespace Database\Factories;

use App\Models\Brand;
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
            'category_id'=>Category::factory()->create(),
            'brand'=>Brand::factory()->create(),
            'original_price'=>'22',
            'selling_price'=>'33',
            'quantity'=>'22',
            'trending'=>'0',
            'name'=>fake()->name(),
            'slug'=>fake()->slug(),
            'small_description'=>fake()->paragraph(),
            'description'=>fake()->paragraph(),
            'meta_title'=>fake()->name(),
            'meta_keyword'=>fake()->slug,
            'meta_description'=>fake()->paragraph(),
            'status'=>'0'
        ];
    }
}
