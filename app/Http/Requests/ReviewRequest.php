<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
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
     * @return array<string, mixed>
    */
    public function rules()
    {
        return [
            'rating' => 'required',
            'comment' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'rating.required' => 'Không được để trống',
            'comment.required' => 'Không được để trống',
        ];
    }
}
