<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email' => 'required|min:10|max:250',
            'password' => 'required|min:8',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'الرجاء إدخال البريد الإلكتروني',
            'email.email' => 'الرجاء إدخال بريد إلكتروني صحيح ',
            'password.required' => 'الرجاء إدخال كلمة المرور ',
        ];
    }
}
