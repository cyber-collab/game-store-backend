<?php

namespace App\Interfaces;

interface ProductRepositoryInterface
{
    public function getAllProducts();
    public function getProductsByCategory(string $slug);
    public function getProductsByTagTopSales();
    public function getProductsByTagNew();
    public function getProductsBySubcategory(string $categorySlug, string $subCategorySlug);
}
