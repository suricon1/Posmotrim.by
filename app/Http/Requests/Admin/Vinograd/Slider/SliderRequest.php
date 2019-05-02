<?php

namespace App\Http\Requests\Admin\Vinograd\Slider;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
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
            'title' => 'required',
            'text'  => 'required',
            'image' => 'nullable|image|dimensions:min_width=1600,min_height=700'
        ];
    }
}
