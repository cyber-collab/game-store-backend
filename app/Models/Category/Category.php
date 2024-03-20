<?php

namespace App\Models\Category;

use App\Models\Products\Product;
use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    use HasFactory;

    public function products()
    {
        return $this->belongsToMany(Product::class, 'category_product');
    }

    public function subcategories(): BelongsToMany
    {
        return $this->belongsToMany(SubCategory::class, 'category_subcategory', 'category_id', 'sub_category_id');
    }

    protected $fillable = ['name', 'title',  'images', 'slug', 'description', 'parent_id', 'status'];

}
