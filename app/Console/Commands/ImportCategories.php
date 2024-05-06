<?php

namespace App\Console\Commands;

use App\Services\Google\GoogleDriveDownloader;
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

        foreach ($categories['data'] as $categoryData) {
            $downloader = new GoogleDriveDownloader();

            if (isset($categoryData['image'])) {
                $fileName = $downloader->downloadImage($categoryData['image']);
            }

            if (isset($categoryData['icon'])) {
                $fileNameIcon = $downloader->downloadImage($categoryData['icon']);
            }
            $category = Category::updateOrCreate([
                'name' => $categoryData['name'],
                'status' => $categoryData['status'],
                'image' => $fileName ?? null,
                'icon' => $fileNameIcon ?? null,
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
            ]);

            $subcategory->categories()->attach($category->id);
        }
    }
}
