<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CharacteristicResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'product_id' => $this->product_id,
            'display_size' => $this->display_size,
            'resolving_power' => $this->resolving_power,
            'screen' => $this->screen,
            'matrix_type' => $this->matrix_type,
            'screen_refresh_rate' => $this->screen_refresh_rate,
            'processor' => $this->processor,
            'number_of_processor_cores' => $this->number_of_processor_cores,
            'RAM_type' => $this->RAM_type,
            'RAM_capacity' => $this->RAM_capacity,
            'types_of_hard_drives' => $this->types_of_hard_drives,
            'SSD_size' => $this->SSD_size,
            'video_card_type' => $this->video_card_type,
            'video_card' => $this->video_card,
            'amount_of_VRAM' => $this->amount_of_VRAM,
            'OS' => $this->OS,
            'battery_capacity' => $this->battery_capacity,
            'weight' => $this->weight,
            'country_of_production' => $this->country_of_production,
        ];
    }
}
