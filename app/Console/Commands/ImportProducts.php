<?php

namespace App\Console\Commands;

use App\Models\Products\Image;
use Illuminate\Console\Command;
use App\Models\Products\Product;
use App\Models\Category\Category;
use Illuminate\Support\Facades\Storage;

class ImportProducts extends Command
{
    protected $signature = 'import:products';

    protected $description = 'Import products data into database';

    public function handle(): void
    {
        $jsonFile = Storage::path('public/catalog.json');
        $data = json_decode(file_get_contents($jsonFile), true);

        foreach ($data as $productData) {
            $product = Product::createProduct([
                'title' => $productData['title'],
                'description' => $productData['description'],
                'new' => $productData['new'] ?? false,
                'top_sales' => $productData['top_sales'] ?? false,
                'quantity' => $productData['quantity'] ?? 0,
                'color' => $productData['color'] ?? 'black',
                'product_code' => $productData['product_code'],
                'additional_code' => $productData['additional_code'],
                'article' => $productData['article'],
                'price' => $productData['cost']['price'],
                'currency' => $productData['cost']['currency'],
                'discount_percentage' => $productData['cost']['discount_percentage'],
                'sale' => $productData['cost']['sale'] ?? false,
                'characteristics' => $productData['characteristics'],
            ]);

            if (isset($data['characteristics'])) {
                $product->characteristics()->create($data['characteristics']);
            }

            $category = Category::firstOrCreate([
                'name' => $productData['navigation']['category'],
                'title' => $productData['navigation']['category'],
            ]);

            $product->categories()->syncWithoutDetaching([$category->id]);

            foreach ($productData['images']['images_set'] as $imageUrl) {
                $imageName = basename($imageUrl);
                $storagePath = 'public/images/' . $imageName;
                $storedPath = Storage::put($storagePath, file_get_contents($imageUrl));

                if ($storedPath) {
                    $image = new Image();
                    $image->product_id = $product->id;
                    $image->images_set = $imageUrl;
                    $image->save();
                }
            }



            foreach ($productData['tags'] as $tag) {
                $product->tags()->create(['tag' => $tag]);
            }
        }

        $this->info('Products imported successfully.');
    }
}
