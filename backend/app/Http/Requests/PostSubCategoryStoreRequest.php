<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostSubCategoryStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'post_main_category_id' => 'required|exists:post_main_categories,id',
            'sub_category' => 'required|string|max:100|unique:post_sub_categories',
        ];
    }

    public function messages()
    {
        return [
            'post_main_category_id.required' => '※メインカテゴリーを選択してください',
            'post_main_category_id.exists' => '※プルダウンから選択してください',
            'sub_category.required' => '※サブカテゴリーは必須項目です',
            'sub_category.string' => '※文字列で入力してください',
            'sub_category.max' => '※サブカテゴリーが長すぎます',
            'sub_category.unique' => '※登録済みのサブカテゴリーです',
        ];
    }
}
