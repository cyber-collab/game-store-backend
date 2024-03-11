<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cost extends Model
{
    protected $fillable = [
        'product_id',
        'sale',
        'price',
        'currency',
        'discount_percentage',

    ];
}
