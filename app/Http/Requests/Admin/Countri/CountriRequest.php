<?php

namespace App\Http\Requests\Admin\Countri;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CountriRequest extends FormRequest
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
            'name'  =>  'required|string|max:100',
            'title' =>  'required|string|max:255',
            'image' =>  'nullable|image|mimes:jpg,jpeg,png|dimensions:min_width=1920,min_height=945',
            'slug'  =>  [
                'sometimes',
                'required',
                'string',
                'max:255',
                Rule::unique('countris')->ignore($this->countri),
            ]
        ];
    }
    public function messages()
    {
        return [
            'image.mimes'      => 'Фото должно быть форматов: jpg, jpeg, png.',
            'image.dimensions' => 'Размер Фото должен быть не менее:  1920 x 945 px.'
        ];
    }
}
