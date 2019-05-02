<?php

namespace App\Http\Requests\Admin\TagDesc;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TagDescRequest extends FormRequest
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
            'title'      => 'required|string|max:255',
            'text'       => 'nullable|string',
            'countri_id' => 'required|integer|exists:countris,id',
            //'city_id'    => 'nullable|integer|exists:citys,id',
            'city_id'    =>
                [
                    'nullable',
                    'integer',
                    Rule::exists('citys', 'id')->where(function ($query) {
                        $query->where('countri_id', $this->request->get('countri_id'));
                    })
                ],
            'tag_id'     => 'required|integer|exists:tags,id',
            'meta_desc'  => 'nullable|string|max:255',
            'meta_key'   => 'nullable|string|max:255'
        ];
    }
}