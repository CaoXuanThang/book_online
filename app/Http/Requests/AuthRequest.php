<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
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
                    case 'login':
                        $rules = [
                            'email' => 'required',
                            'password' => 'required',
                        ];
                        break;
                    case 'register':
                        $rules = [
                          'name' => 'required',
                            'email' => 'required|email|unique:users,email',
                            'password' => 'required',

                        ];
                }
                break;
        }
        return $rules;
    }
    public function messages()
    {
        return [
            'email.required' => 'Email không được để trống',
            'password.required' => 'Mật khẩu không được để trống',
            'email.email' => 'Email không đúng định dạng',
            'email.unique' => 'Email đã tồn tại',
        ];
    }
}
