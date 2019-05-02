<?php

namespace App\Http\Requests\Site;

use Auth;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DeleteCommentRequest extends FormRequest
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
            'comment_id' =>
            [
                'required',
                'integer',
                Rule::exists('comments', 'id')->where(function ($query) {
                    $query->where('user_id', Auth::user()->id);
                })
            ]
        ];
    }

    public function messages()
    {
        return [
            'comment_id.required' => 'У вас нет прав для удаления этого комментария!',
            'comment_id.integer'  => 'У вас нет прав для удаления этого комментария!',
            'comment_id.exists'   => 'У вас нет прав для удаления этого комментария!'
        ];
    }
}
