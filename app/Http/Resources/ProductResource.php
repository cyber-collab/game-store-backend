<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'title' => $this->title,
            'images' => ImageResource::collection($this->images),
            'description' => $this->description,
            'quantity' => $this->quantity,
            'color' => $this->color,
            'product_code' => $this->product_code,
            'additional_code' => $this->additional_code,
            'article' => $this->article,
            'price' => $this->price,
            'currency' => $this->currency,
            'discount_percentage' => $this->discount_percentage,
            'sale' => $this->sale,
            'characteristics' => new CharacteristicResource($this->characteristics),
            'tags' => $this->tags,
            'categories' => CategoryResource::collection($this->categories),
        ];
    }
}
