<?php

namespace App\Http\Requests;

use App\Models\Posts\PostSubCategory;
use Illuminate\Foundation\Http\FormRequest;

class PostStoreAndUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'post_sub_category_id' => 'required|exists:post_sub_categories,id',
            'title' => 'required|string|max:50',
            'post' => 'required|string|max:5000',
        ];
    }

    public function messages()
    {
        return [
            'post_sub_category_id.required' => '※カテゴリーを選択してください',
            'post_sub_category_id.exists' => '※プルダウンから選択してください',
            'title.required' => '※タイトルは必須項目です',
            'title.string' => '※文字列で入力してください',
            'title.max' => '※タイトルが長すぎます',
            'post.required' => '※投稿内容は必須項目です',
            'post.string' => '※文字列で入力してください',
            'post.max' => '※投稿内容が長すぎます',
        ];
    }
}
