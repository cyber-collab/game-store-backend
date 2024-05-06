<?php

namespace App\Models\Products;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 *
 *
 * @property int $id
 * @property int $product_id
 * @property int|null $sale
 * @property string $price
 * @property string $currency
 * @property int|null $discount_percentage
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Cost newModelQuery()
 * @method static Builder|Cost newQuery()
 * @method static Builder|Cost query()
 * @method static Builder|Cost whereCreatedAt($value)
 * @method static Builder|Cost whereCurrency($value)
 * @method static Builder|Cost whereDiscountPercentage($value)
 * @method static Builder|Cost whereId($value)
 * @method static Builder|Cost wherePrice($value)
 * @method static Builder|Cost whereProductId($value)
 * @method static Builder|Cost whereSale($value)
 * @method static Builder|Cost whereUpdatedAt($value)
 * @method static orderBy(string $string, string $sortingMethod)
 * @mixin Eloquent
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
