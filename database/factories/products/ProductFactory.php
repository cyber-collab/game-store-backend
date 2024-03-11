<?php
namespace Database\Factories\products;

use App\Models\Products\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'new' => $this->faker->boolean,
            'top_sales' => $this->faker->boolean,
            'summary' => $this->faker->text,
            'color' => $this->faker->colorName,
            'product_code' => $this->faker->unique()->ean8,
            'additional_code' => $this->faker->ean8,
            'article' => $this->faker->isbn10,
        ];
    }
}
