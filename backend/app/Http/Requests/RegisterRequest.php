<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'username' => 'required|string|max:10',
            'email' => 'required|email|unique:users|max:70',
            'password' => 'min:8|max:30|required|confirmed',
        ];
    }

    public function messages()
    {
        return [
            'username.required' => '※ユーザー名は必須項目です',
            'username.string' => '※文字列で入力してください',
            'username.max' => '※ユーザー名が長すぎます',
            'email.required' => '※メールアドレスは必須項目です',
            'email.email' => '※無効なメールアドレスの形式です',
            'email.unique' => '※登録済みのメールアドレスです',
            'email.max' => '※メールアドレスが長すぎます',
            'password.min' => '※パスワードが短すぎます',
            'password.max' => '※パスワードが長すぎます',
            'password.required' => '※パスワードは必須項目です',
            'password.confirmed' => '※確認用のパスワードと一致しません',
        ];
    }
}
