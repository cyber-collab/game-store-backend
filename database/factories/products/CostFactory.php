<?php
namespace Database\Factories\products;

use App\Models\Products\Cost;
use App\Models\Products\Product;

use Illuminate\Database\Eloquent\Factories\Factory;

class CostFactory extends Factory
{
    protected $model = Cost::class;

    public function definition()
    {
        return [
            'product_id' =>Product::factory(),
            'sale' => $this->faker->boolean,
            'price' => $this->faker->randomNumber(5),
            'currency' => $this->faker->currencyCode,
            'discount_percentage' => $this->faker->numberBetween(0, 100),
        ];
    }
}
