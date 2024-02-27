<?php

namespace App\Models\Category;

use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'status'];

    public function subcategories(): BelongsToMany
    {
        return $this->belongsToMany(SubCategory::class, 'category_subcategory', 'category_id', 'sub_category_id');
    }
}
