<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @method static findOrFail(int $id)
 * @property int $id
 * @property string $title
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|HomeBlockHero newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HomeBlockHero newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HomeBlockHero query()
 * @method static \Illuminate\Database\Eloquent\Builder|HomeBlockHero whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HomeBlockHero whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HomeBlockHero whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HomeBlockHero whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HomeBlockHero whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class HomeBlockHero extends Model
{
    use HasFactory;

    protected $table = 'homepage_blocks_hero';

    protected $fillable = ['title', 'description'];
}
