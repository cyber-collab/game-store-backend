<?php
namespace Database\Factories\products;

use App\Models\Products\Image;
use App\Models\Products\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    protected $model = Image::class;

    public function definition()
    {
        return [
            'product_id' => Product::factory(),
            'images_cover' => $this->faker->imageUrl(),
            'images_set' => json_encode([$this->faker->imageUrl(), $this->faker->imageUrl(), $this->faker->imageUrl()]),
        ];
    }
}
