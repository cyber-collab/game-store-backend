<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static findOrFail(int $id)
 */
class HomeBlockHero extends Model
{
    use HasFactory;

    protected $table = 'homepage_blocks_hero';

    protected $fillable = ['title', 'description'];
}
