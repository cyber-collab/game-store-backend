<?php

namespace App\Models\Category;

use App\Models\Products\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function products()
    {
        return $this->belongsToMany(Product::class, 'category_product');
    }

    protected $fillable = ['name', 'title',  'images', 'slug', 'description', 'parent_id', 'status'];


}
