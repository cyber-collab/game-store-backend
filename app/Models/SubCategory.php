<?php

namespace App\Models;

use App\Models\Category\Category;
use Cviebrock\EloquentSluggable\Sluggable;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Carbon;

/**
 *
 *
 * @property int $id
 * @property string $name
 * @property string|null $slug
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection<int, Category> $categories
 * @property-read int|null $categories_count
 * @method static Builder|SubCategory newModelQuery()
 * @method static Builder|SubCategory newQuery()
 * @method static Builder|SubCategory query()
 * @method static Builder|SubCategory whereCreatedAt($value)
 * @method static Builder|SubCategory whereId($value)
 * @method static Builder|SubCategory whereName($value)
 * @method static Builder|SubCategory whereSlug($value)
 * @method static Builder|SubCategory whereUpdatedAt($value)
 * @method static where(string $string, string $subCategorySlug)
 * @mixin Eloquent
 */
class SubCategory extends Model
{
    use HasFactory;
    use Sluggable;


    protected $fillable = ['name', 'slug'];

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'category_subcategory', 'sub_category_id', 'category_id');
    }

    /**
     * @return string[]
     */
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
