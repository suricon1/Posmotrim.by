<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PostRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'title'      => 'required|string|max:255',
            'content'    => 'required|string',
            'countri_id' => 'required|integer|exists:countris,id',
            'city_id'    =>
                [
                    'nullable',
                    'integer',
                    Rule::exists('citys', 'id')->where(function ($query) {
                        $query->where('countri_id', $this->request->get('countri_id'));
                    })
                ],
            'image'      => 'nullable|image|mimes:jpg,jpeg,png',
            'slug'       => ['sometimes', 'required', 'string', 'max:255', Rule::unique('posts')->ignore($this->post)]
        ];
    }

    public function messages()
    {
        return [
            'city_id.exists' => 'Введены некорректные данные.'
        ];
    }
}
