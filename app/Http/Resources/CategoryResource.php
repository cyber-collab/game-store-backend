<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
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
            'name' => $this->name,
            'slug' => $this->slug,
            'status' => $this->status,
            'image' => url('/storage/images/categories/' . $imagesSetWithoutQuotes),
            'subcategories' => SubCategoryResource::collection($this->subcategories),
        ];
    }
}
