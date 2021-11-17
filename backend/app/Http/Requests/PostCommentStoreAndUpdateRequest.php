<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostCommentStoreAndUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'comment' => 'required|string|max:2500',
        ];
    }

    public function messages()
    {
        return [
            'comment.required' => '※コメントは必須項目です',
            'comment.string' => '※文字列で入力してください',
            'comment.max' => '※コメントが長すぎます',
        ];
    }
}
