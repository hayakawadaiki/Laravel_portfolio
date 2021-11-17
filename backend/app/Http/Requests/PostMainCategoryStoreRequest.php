<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostMainCategoryStoreRequest extends FormRequest

{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'main_category' => 'required|string|max:100|unique:post_main_categories',
        ];
    }

    public function messages()
    {
        return [
            'main_category.required' => '※メインカテゴリーは必須項目です',
            'main_category.string' => '※文字列で入力してください',
            'main_category.max' => '※メインカテゴリーが長すぎます',
            'main_category.unique' => '※登録済みのメインカテゴリーです',
        ];
    }
}
