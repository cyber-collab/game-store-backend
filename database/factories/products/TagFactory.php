<?php
namespace Database\Factories\products;


use App\Models\Products\Tag;
use  App\Models\Products\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class TagFactory extends Factory
{
    protected $model = Tag::class;

    public function definition()
    {
        return [
            'tag' => $this->faker->word,
            'product_id' => Product::inRandomOrder()->first()->id,
        ];
    }
}
