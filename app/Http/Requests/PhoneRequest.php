<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PhoneRequest extends FormRequest
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
                            'category_id' => 'required',
                            'brand_id' => 'required',
                            'name' => 'required',
                            'image' => 'required|image',
                            'price' => 'required',
                            'description' => 'required',
                            'discount' => 'min:0|max:100',
                        ];
                        break;
                    case 'edit':
                        $rules = [
                            'name' => 'required',
                            'price' => 'required',
                            'description' => 'required',
                            'discount' => 'min:0|max:100',
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
            'category_id.required' => 'Không được để trống danh mục',
            'name.required' => 'Không được để trống tên',
            'image.required' => 'Không được để trống ảnh',
            'image.image' => 'Không đúng định dạng ảnh',
            'price.required' => 'Không được để trống giá',
            'description.required' => 'Không được để trống mô tả',
            'discount.min' => 'Định bán đắt hơn sao',
            'discount.max' => 'Định cho à'
        ];
    }
}
