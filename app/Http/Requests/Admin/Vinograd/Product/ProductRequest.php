<?php

namespace App\Http\Requests\Admin\Vinograd\Product;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //'title' =>'nullable',
            'name' =>'required|string|max:255',
            'content'   =>  'required|string',
            'category_id'   =>  'required|integer|exists:vinograd_categorys,id',
            'meta.*' => 'nullable|string|max:255',
            'image' =>  'nullable|image',
            'gallery.*' => 'nullable|image|max:500',
            'images.*' => 'nullable|image|max:500',
            'slug' =>  [
                'nullable',
                'string',
                Rule::unique('vinograd_products')->ignore($this->product),
            ]
        ];
    }
}
