<?php

namespace App\Interfaces;

interface ProductRepositoryInterface
{
    public function getAllProducts();
    public function getProductsByCategory(string $slug);
    public function getProductsByTagTopSales();
    public function getProductsByTagNew();
    public function getProductsBySubcategory(string $categorySlug, string $subCategorySlug);
    public function getProductsByKeywords(string $keyword);
    public function getProductsSortingByDate(string $sortingMethod);
}
