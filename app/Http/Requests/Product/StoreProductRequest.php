<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // Можно изменить на соответствующую логику авторизации
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        //$this->dd();

        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'new' => 'nullable|boolean',
            'top_sales' => 'nullable|boolean',
            'quantity' => 'nullable|integer|min:0',
            'summary' => 'nullable|string',
            'color' => 'nullable|string|max:255',
            'product_code' => 'nullable|string|max:255',
            'additional_code' => 'nullable|string|max:255',
            'article' => 'nullable|string|max:255',
            'price' => 'required|numeric|min:0',
            'currency' => 'required|string|max:255',
            'discount_percentage' => 'nullable|integer|min:0|max:100',
            'sale' => 'nullable|boolean',
            'producer' => 'nullable|string|max:255',
            'display_size' => 'nullable|string|max:255',
            'resolving_power' => 'nullable|string|max:255',
            'screen' => 'nullable|string|max:255',
            'matrix_type' => 'nullable|string|max:255',
            'screen_refresh_rate' => 'nullable|string|max:255',
            'processor' => 'nullable|string|max:255',
            'number_of_processor_cores' => 'nullable|integer|min:0',
            'RAM_type' => 'nullable|string|max:255',
            'RAM_capacity' => 'nullable|string|max:255',
            'types_of_hard_drives' => 'nullable|string|max:255',
            'SSD_size' => 'nullable|string|max:255',
            'video_card_type' => 'nullable|string|max:255',
            'video_card' => 'nullable|string|max:255',
            'amount_of_VRAM' => 'nullable|integer|min:0',
            'OS' => 'nullable|string|max:255',
            'battery_capacity' => 'nullable|string|max:255',
            'weight' => 'nullable|string|max:255',
            'country_of_production' => 'nullable|string|max:255',
           /* 'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tags.*' => 'nullable|string|max:255',*/
        ];
    }
}
