<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Category\Category;
use App\Models\Subcategory;
use Illuminate\Support\Facades\Storage;

class ImportCategories extends Command
{
    protected $signature = 'import:categories';

    protected $description = 'Import categories with subcategories';

    public function handle()
    {
        $jsonFile = Storage::path('public/api-categories.json');
        $categories = json_decode(file_get_contents($jsonFile), true);

        foreach ($categories as $categoryData) {
            $category = Category::create([
                'name' => $categoryData['name'],
                'slug' => $categoryData['slug'],
                'status' => $categoryData['status'],
            ]);

            $this->createSubcategories($category, $categoryData['subcategories']);
        }

        $this->info('Categories imported successfully.');
    }

    private function createSubcategories(Category $category, array $subcategoriesData)
    {
        foreach ($subcategoriesData as $subcategoryData) {
            $subcategory = Subcategory::create([
                'category_id' => $category->id,
                'name' => $subcategoryData['name'],
                'slug' => $subcategoryData['slug'],
            ]);

            // Optional: If you want to establish the reverse relationship, you can do it here
            $subcategory->categories()->attach($category->id);
        }
    }
}
