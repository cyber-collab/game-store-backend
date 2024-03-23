<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Category\Category;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Storage;

class ImportCategories extends Command
{
    protected $signature = 'import:categories';

    protected $description = 'Import categories with subcategories';

    public function handle(): void
    {
        $jsonFile = Storage::path('public/api-categories.json');
        $categories = json_decode(file_get_contents($jsonFile), true);

        foreach ($categories as $categoryData) {
            $category = Category::updateOrCreate([
                'name' => $categoryData['name'],
                'slug' => $categoryData['slug'],
                'status' => $categoryData['status'],
            ]);

            if (isset($categoryData['subcategories'])) {
                $this->createSubcategories($category, $categoryData['subcategories']);
            }
        }

        $this->info('Categories imported successfully.');
    }

    private function createSubcategories(Category $category, array $subcategoriesData): void
    {
        foreach ($subcategoriesData as $subcategoryData) {
            $subcategory = SubCategory::create([
                'category_id' => $category->id,
                'name' => $subcategoryData['name'],
                'slug' => $subcategoryData['slug'],
            ]);

            $subcategory->categories()->attach($category->id);
        }
    }
}
