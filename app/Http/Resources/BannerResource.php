<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BannerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $imagesSetWithoutQuotes = trim($this->image, '"');

        return [
            'id' => $this->id,
            'image' => url('/storage/images/banners/' . $imagesSetWithoutQuotes),
        ];
    }
}
