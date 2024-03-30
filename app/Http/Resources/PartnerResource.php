<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PartnerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $imagesSetWithoutQuotes = trim($this->link, '"');

        return [
            'id' => $this->id,
            'images' => url('/storage/images/partners/' . $imagesSetWithoutQuotes),
        ];

    }
}
