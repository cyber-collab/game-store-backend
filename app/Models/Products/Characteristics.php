<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *
 *
 * @property int $id
 * @property int $product_id
 * @property string|null $producer
 * @property string $display_size
 * @property string|null $resolving_power
 * @property string|null $screen
 * @property string $matrix_type
 * @property string|null $screen_refresh_rate
 * @property string|null $processor
 * @property int|null $number_of_processor_cores
 * @property string|null $RAM_type
 * @property string|null $RAM_capacity
 * @property string|null $types_of_hard_drives
 * @property string|null $SSD_size
 * @property string|null $video_card_type
 * @property string|null $video_card
 * @property string|null $amount_of_VRAM
 * @property string|null $OS
 * @property string|null $battery_capacity
 * @property string|null $weight
 * @property string|null $country_of_production
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Characteristics newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Characteristics newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Characteristics query()
 * @method static \Illuminate\Database\Eloquent\Builder|Characteristics whereAmountOfVRAM($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Characteristics whereBatteryCapacity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Characteristics whereCountryOfProduction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Characteristics whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Characteristics whereDisplaySize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Characteristics whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Characteristics whereMatrixType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Characteristics whereNumberOfProcessorCores($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Characteristics whereOS($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Characteristics whereProcessor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Characteristics whereProducer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Characteristics whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Characteristics whereRAMCapacity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Characteristics whereRAMType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Characteristics whereResolvingPower($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Characteristics whereSSDSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Characteristics whereScreen($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Characteristics whereScreenRefreshRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Characteristics whereTypesOfHardDrives($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Characteristics whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Characteristics whereVideoCard($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Characteristics whereVideoCardType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Characteristics whereWeight($value)
 * @mixin \Eloquent
 */
class Characteristics extends Model
{
    protected $fillable = [
        'characteristics',
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->fill($attributes);
    }

}
