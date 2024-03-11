<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['images_cover', 'images_set'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
