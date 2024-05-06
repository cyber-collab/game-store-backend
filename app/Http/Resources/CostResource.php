<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'sale' => $this->sale,
            'price' => $this->price,
            'currency' => $this->currency,
            'discount_percentage' => $this->discount_percentage,
        ];
    }
}
