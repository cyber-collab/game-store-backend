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
        $product = static::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'new' => $data['new'] ?? false,
            'top_sales' => $data['top_sales'] ?? false,
            'quantity' => $data['quantity'] ?? 0,
            'color' => $data['color'] ?? 'black',
            'product_code' => $data['product_code'],
            'additional_code' => $data['additional_code'] ?? null,
            'article' => $data['article'],
        ]);

        if (isset($data['characteristics'])) {
            $product->characteristics()->create($data['characteristics']);
        }

        $product->costs()->create([
            'price' => $data['price'],
            'currency' => $data['currency'],
            'discount_percentage' => $data['discount_percentage'],
            'sale' => $data['sale'] ?? false,
        ]);

        if (isset($data['images'])) {
            foreach ($data['images'] as $imageData) {
                $product->images()->create($imageData);
            }
        }

        if (isset($data['tags'])) {
            foreach ($data['tags'] as $tagData) {
                $product->tags()->create($tagData);
            }
        }

        return $product;
    }

    protected static function boot()
    {
        parent::boot();


        static::saving(function ($product) {
            $product->setSummaryAttribute();
        });
    }
    public function setSummaryAttribute()
    {
        $summary = "Display Size: {$this->display_size}, ";
        $summary .= "Resolving Power: {$this->resolving_power}, ";
        $summary .= "Screen: {$this->screen}, ";
        $summary .= "Matrix Type: {$this->matrix_type}, ";
        $summary .= "Screen Refresh Rate: {$this->screen_refresh_rate}, ";
        $summary .= "Processor: {$this->processor}, ";
        $summary .= "Number of Processor Cores: {$this->number_of_processor_cores}, ";
        $summary .= "RAM Type: {$this->RAM_type}, ";
        $summary .= "RAM Capacity: {$this->RAM_capacity}, ";
        $summary .= "Types of Hard Drives: {$this->types_of_hard_drives}, ";
        $summary .= "SSD Size: {$this->SSD_size}, ";
        $summary .= "Video Card Type: {$this->video_card_type}, ";
        $summary .= "Video Card: {$this->video_card}, ";
        $summary .= "Amount of VRAM: {$this->amount_of_VRAM}, ";
        $summary .= "OS: {$this->OS}, ";
        $summary .= "Battery Capacity: {$this->battery_capacity}, ";
        $summary .= "Weight: {$this->weight}, ";
        $summary .= "Country of Production: {$this->country_of_production}";


        $this->attributes['summary'] = $summary;
    }

    public static function updateProduct(array $data)
    {
        //dd($data);
        $productId = $data['id'];

        //dd($data);
        $product = static::updateOrCreate(
            ['id' => $productId],
            [
                'title' => $data['title'],
                'description' => $data['description'],
                'new' => $data['new'] ?? false,
                'top_sales' => $data['top_sales'] ?? false,
                'quantity' => $data['quantity'] ?? 0,
                'color' => $data['color'] ?? 'black',
                'product_code' => $data['product_code'],
                'additional_code' => $data['additional_code'],
                'article' => $data['article'],
            ]
        );


        if (isset($data['cost'])) {
            $product->costs()->updateOrCreate(
                ['product_id' => $product->id],
                [
                    'price' => $data['cost']['price'],
                    'currency' => $data['cost']['currency'],
                    'discount_percentage' => $data['cost']['discount_percentage'],
                    'sale' => $data['cost']['sale'] ?? false,
                ]
            );
        }

        if (isset($data['characteristics'])) {
            $product->updateCharacteristics($data['characteristics']);
        }

        if (isset($data['images'])) {
            foreach ($data['images'] as $imageData) {
                $imageId = $imageData['id'];
                $image = Image::find($imageId);
                if ($image) {
                    $image->update($imageData);
                }
            }
        }

        if (isset($data['tags'])) {
            foreach ($data['tags'] as $tagData) {
                $tagId = $tagData['id'];
                $tag = Tag::find($tagId);
                if ($tag) {
                    $tag->update($tagData);
                }
            }
        }

        return $product;
    }
}
