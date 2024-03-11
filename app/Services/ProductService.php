<?php

namespace App\Services;

use App\Models\Products\Product;

class ProductService
{
    public function createProduct(array $data)
    {
        return Product::createProduct($data);
    }
}
