<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ImageResource extends JsonResource
{
    public function toArray($request)
    {
        $imagesSetWithoutQuotes = trim($this->images_set, '"');

        return [
            'images' => url('/storage/images/' . $imagesSetWithoutQuotes),
        ];
    }
}
