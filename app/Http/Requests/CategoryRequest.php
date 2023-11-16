<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'name.required' => 'Tên danh mục không được để trống',
        ];
    }
}
