<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class CategoryCreateRequest extends FormRequest
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
            'title'            =>  'required|min:2|max:200',
            'slug'             =>  'max:200',
            'description'      =>  'string|max:500|min:3',
            'parent_id'        =>  'nullable',
            'status'           =>  'required',

        ];
    }
}
