<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
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
        $rules = [];
        $method = $this->getMethod();
        $action = $this->route()->getActionMethod();

        switch ($method) {
            case 'POST':
                switch ($action) {
                    case 'create':
                        $rules = [
                            'name' => 'required',
                            'image' => 'required|max:2048|image|mimes:jpeg,png,jpg,gif,svg',
                        ];
                        break;
                    case 'edit':
                        $rules = [
                            'name' => 'required',
                        ];
                        break;
                }
                break;
        }
        return $rules;
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên không được để trống',
            'image.required' => 'Ảnh không được để trống',
            'image.image' => 'Ảnh không đúng định dạng',
            'image.max' => 'Ảnh quá lớn',
        ];
    }
}
