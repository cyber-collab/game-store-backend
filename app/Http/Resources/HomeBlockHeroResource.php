<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HomeBlockHeroResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return  [
            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'description' => $this->description,
            'images' => HeroImageResource::collection($this->heroImages),
        ];
    }
}
