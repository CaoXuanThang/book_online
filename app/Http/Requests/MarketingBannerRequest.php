<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MarketingBannerRequest extends FormRequest
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
                            'image' => 'required|image',
                            'description' => 'required',
                            'book_id' => 'required',
                        ];
                        break;
                    case 'edit':
                        $rules = [
                            'name' => 'required',
                            'description' => 'required',
                            'book_id' => 'required',
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
            'description.required' => 'Mô tả không được để trống',
            'book_id.required' => 'Tên danh mục không được để trống',
            'image.required' => 'Ảnh không được để trống',
            'image.image' => 'Ảnh không đúng định dạng',
        ];
    }
}
