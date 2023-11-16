<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PromotionRequest extends FormRequest
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
                            'discount' => 'min:0|required',
                            'start_date' => 'required',
                            'end_date' => 'required',                          
                        ];
                        break;
                    case 'edit':
                        $rules = [
                            'discount' => 'min:0|required',
                            'start_date' => 'required',
                            'end_date' => 'required',
                        ];
                        break;
                }
                break;
        }
        return $rules;

    }
}
