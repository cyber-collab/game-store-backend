<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
      //$this->dd();
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'new' => 'required|boolean',
            'top_sales' => 'required|boolean',
            'summary' => 'required|string',
            'color' => 'required|string|max:50',
            'product_code' => 'required|string|max:50',
            'additional_code' => 'required|string|max:50',
            'article' => 'required|string|max:50',
        ];
    }
}
