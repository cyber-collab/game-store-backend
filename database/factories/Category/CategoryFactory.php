<?php

namespace Database\Factories\Category;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'parent_id' => 1,
            'name' => $this->faker->word,
            'slug' => $this->faker->slug,
            'title' => $this->faker->word,
            'description' => $this->faker->sentence,
            'status' => $this->faker->numberBetween(0, 1),
        ];
    }
}
