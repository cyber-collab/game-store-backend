<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *
 *
 * @property int $id
 * @property int $product_id
 * @property int|null $sale
 * @property string $price
 * @property string $currency
 * @property int|null $discount_percentage
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Cost newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cost newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cost query()
 * @method static \Illuminate\Database\Eloquent\Builder|Cost whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cost whereCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cost whereDiscountPercentage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cost whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cost wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cost whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cost whereSale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cost whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
