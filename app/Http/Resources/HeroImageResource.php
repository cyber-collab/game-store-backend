<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class HeroImageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param $request
     * @return string
     */

    public function toArray($request): string
    {
        return $this->image;

    }
}
