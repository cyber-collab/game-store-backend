<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HeroImage extends Model
{
    use HasFactory;

    protected $fillable = ['home_block_hero_id', 'image'];

    public function homeBlockHero(): BelongsTo
    {
        return $this->belongsTo(HomeBlockHero::class);
    }
}
