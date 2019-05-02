<?php

namespace App\Http\Requests\Vinograd;

use Illuminate\Foundation\Http\FormRequest;

class AddCommentRequest extends FormRequest
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
            'text'	 => 'required',
            'product_id' => 'required|integer|exists:vinograd_products,id',
            'parent_id'  => 'nullable|integer|exists:vinograd_comments,id',
            'name'	     => 'sometimes|required|max:20',
            'user_id'    => 'sometimes|required|integer',
            'email'      => 'sometimes|required|email'
        ];
    }
}
