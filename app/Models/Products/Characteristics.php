<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Characteristics extends Model
{

    protected $fillable = [
        'producer',
        'display_size',
        'resolving_power',
        'screen',
        'matrix_type',
        'screen_refresh_rate',
        'processor',
        'number_of_processor_cores',
        'RAM_type',
        'RAM_capacity',
        'types_of_hard_drives',
        'SSD_size',
        'video_card_type',
        'video_card',
        'amount_of_VRAM',
        'OS',
        'battery_capacity',
        'weight',
        'country_of_production',
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->fill($attributes);
    }

}
