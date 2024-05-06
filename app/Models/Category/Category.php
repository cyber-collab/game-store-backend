<?php

namespace App\Models\Category;

use App\Models\Products\Product;
use App\Models\SubCategory;
use Cviebrock\EloquentSluggable\Sluggable;
use Database\Factories\Category\CategoryFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Carbon;

/**
 *
 *
 * @property int $id
 * @property string $name
 * @property string|null $title
 * @property string|null $slug
 * @property string|null $description
 * @property string|null $image
 * @property int $status
 * @property int|null $parent_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection<int, Product> $products
 * @property-read int|null $products_count
 * @property-read Collection<int, SubCategory> $subcategories
 * @property-read int|null $subcategories_count
 * @method static CategoryFactory factory($count = null, $state = [])
 * @method static Builder|Category newModelQuery()
 * @method static Builder|Category newQuery()
 * @method static Builder|Category query()
 * @method static Builder|Category whereCreatedAt($value)
 * @method static Builder|Category whereDescription($value)
 * @method static Builder|Category whereId($value)
 * @method static Builder|Category whereImage($value)
 * @method static Builder|Category whereName($value)
 * @method static Builder|Category whereParentId($value)
 * @method static Builder|Category whereSlug($value)
 * @method static Builder|Category whereStatus($value)
 * @method static Builder|Category whereTitle($value)
 * @method static Builder|Category whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Category extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = ['name', 'icon', 'title',  'image', 'slug', 'description', 'parent_id', 'status'];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'category_product');
    }

    public function subcategories(): BelongsToMany
    {
        return $this->belongsToMany(SubCategory::class, 'category_subcategory', 'category_id', 'sub_category_id');
    }

    public function getSluggableFields(): array
    {
        return ['name'];
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name',
            ],
        ];
    }
}
