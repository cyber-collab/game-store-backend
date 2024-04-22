<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
/**
* Determine if the user is authorized to make this request.
*/
    public function authorize()
    {
        return true; // Можно изменить на соответствующую логику авторизации
    }

/**
* Get the validation rules that apply to the request.
*/
    public function rules()
    {
       // $this->dd();
        return [
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'price' => 'required|numeric|min:0',
        'product_code' => 'required|string|max:255',
        'additional_code' => 'required|string|max:255',
        'article' => 'required|string|max:255',
        'quantity' => 'required|integer|min:0',
        'producer' => 'nullable|string|max:255',
        'display_size' => 'nullable|string|max:255',
        'resolving_power' => 'nullable|string|max:255',
        'screen' => 'nullable|string|max:255',
        'matrix_type' => 'nullable|string|max:255',
        'screen_refresh_rate' => 'nullable|string|max:255',
        'processor' => 'nullable|string|max:255',
        'number_of_processor_cores' => 'nullable|string|max:255',
        'RAM_type' => 'nullable|string|max:255',
        'RAM_capacity' => 'nullable|string|max:255',
        'types_of_hard_drives' => 'nullable|string|max:255',
        'SSD_size' => 'nullable|string|max:255',
        'video_card_type' => 'nullable|string|max:255',
        'video_card' => 'nullable|string|max:255',
        'amount_of_VRAM' => 'nullable|string|max:255',
        'OS' => 'nullable|string|max:255',
        'battery_capacity' => 'nullable|string|max:255',
        'weight' => 'nullable|string|max:255',
        'country_of_production' => 'nullable|string|max:255',
        'new' => 'nullable|boolean',
        'top_sales' => 'nullable|boolean',
        'category_ids' => 'nullable|array',
        'category_ids.*' => 'exists:categories,id',
        'currency' => 'nullable|string|max:255',
        'discount_percentage' => 'nullable|numeric|min:0|max:100',
        'status' => 'nullable|boolean',
        ];
    }
}
