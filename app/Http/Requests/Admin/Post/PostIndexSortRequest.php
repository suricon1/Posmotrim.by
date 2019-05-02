<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PostIndexSortRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title'      => 'nullable|string|max:255',
            'id'         => 'nullable|integer|exists:posts,id',
            'tag'        => 'nullable|integer|exists:tags,id',
            'countri_id' => 'nullable|integer|exists:countris,id',
            'city_id'    => [
                'nullable',
                'integer',
                Rule::exists('citys', 'id')->where(function ($query) {
                    if($this->request->get('countri_id')){
                        $query->where('countri_id', $this->request->get('countri_id'));
                    }
                })
            ],
        ];
    }
}
