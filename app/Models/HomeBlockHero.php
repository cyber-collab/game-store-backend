<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 *
 *
 * @method static findOrFail(int $id)
 * @property int $id
 * @property string $title
 * @property string $description
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|HomeBlockHero newModelQuery()
 * @method static Builder|HomeBlockHero newQuery()
 * @method static Builder|HomeBlockHero query()
 * @method static Builder|HomeBlockHero whereCreatedAt($value)
 * @method static Builder|HomeBlockHero whereDescription($value)
 * @method static Builder|HomeBlockHero whereId($value)
 * @method static Builder|HomeBlockHero whereTitle($value)
 * @method static Builder|HomeBlockHero whereUpdatedAt($value)
 * @mixin Eloquent
 */
class HomeBlockHero extends Model
{
    use HasFactory;

    protected $table = 'homepage_blocks_hero';

    protected $fillable = ['title', 'description'];

    public function heroImages(): HasMany
    {
        return $this->hasMany(HeroImage::class);
    }
}
