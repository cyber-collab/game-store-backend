<?php

namespace App\Models\Products;

use App\Models\Category\Category;
use App\Models\Products\Characteristics;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Products\Cost;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function categories()
    {

        return $this->belongsToMany(Category::class, 'category_product');
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function costs()
    {
        return $this->hasMany(Cost::class);
    }

    public function addCost(array $data)
    {
        return $this->costs()->create($data);
    }

    public function tags()
    {
        return $this->hasMany(Tag::class);
    }

    public function characteristics()
    {
        return $this->hasOne(Characteristics::class);
    }

    public static function createProduct(array $data)
    {
        // Создаем продукт
       // dd($data);
        $product = static::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'new' => $data['new'] ?? false,
            'top_sales' => $data['top_sales'] ?? false,
            'quantity' => $data['quantity'] ?? 0,
           /* 'summary' => $data['summary'],*/
            'color' => $data['color'] ?? 'black',
            'product_code' => $data['product_code'],
            'additional_code' => $data['additional_code'],
            'article' => $data['article'],
        ]);

        // Создаем характеристики продукта
        $product->characteristics()->create($data['characteristics'] ?? [
            'producer' => $data['producer'],
            'display_size' => $data['display_size'] ?? 'Інше',
            'resolving_power' => $data['resolving_power'],
            'screen' => $data['screen'],
            'matrix_type' => $data['matrix_type'],
            'screen_refresh_rate' => $data['screen_refresh_rate'],
            'processor' => $data['processor'],
            'number_of_processor_cores' => $data['number_of_processor_cores'],
            'RAM_type' => $data['RAM_type'],
            'RAM_capacity' => $data['RAM_capacity'],
            'types_of_hard_drives' => $data['types_of_hard_drives'],
            'SSD_size' => $data['SSD_size'],
            'video_card_type' => $data['video_card_type'],
            'video_card' => $data['video_card'] ?? null,
            'amount_of_VRAM' => $data['amount_of_VRAM'] ?? null,
            'OS' => $data['OS'],
            'battery_capacity' => $data['battery_capacity'],
            'weight' => $data['weight'],
            'country_of_production' => $data['country_of_production'],

        ]);

        // Создаем стоимость продукта
        $product->costs()->create([
            'price' => $data['price'],
            'currency' => $data['currency'],
            'discount_percentage' => $data['discount_percentage'],
            'sale' => $data['sale'] ?? false,
        ]);

        // Создаем изображения продукта
        if (isset($data['images'])) {
            foreach ($data['images'] as $imageData) {
                $product->images()->create($imageData);
            }
        }

        // Создаем теги продукта
        if (isset($data['tags'])) {
            foreach ($data['tags'] as $tagData) {
                $product->tags()->create($tagData);
            }
        }

        return $product;
    }
}
