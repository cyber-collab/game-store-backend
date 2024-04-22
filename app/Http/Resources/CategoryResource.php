<?php

namespace App\Http\Resources;

use App\Models\SubCategory;
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
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'status' => $this->status,
            'image' => $this->image,
            'subcategories' => $this->hasPivotLoaded('category_product') ? SubCategory::where('id', $this->pivot->subcategory_id)->get() : SubCategoryResource::collection($this->subcategories),
        ];
    }
}
