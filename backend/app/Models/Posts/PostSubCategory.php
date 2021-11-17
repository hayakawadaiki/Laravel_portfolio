<?php

namespace App\Models\Posts;

use Illuminate\Database\Eloquent\Model;

class PostSubCategory extends Model
{
    protected $table = 'post_sub_categories';

    protected $fillable = [
        'post_main_category_id',
        'sub_category',
    ];

    public function post()
    {
        return $this->hasMany('App\Models\Posts\Post');
    }

    // 掲示板の投稿があるかどうかの判断
    public static function postIsExistence($post_sub_category)
    {
        return $post_sub_category->post->isEmpty();
    }

    public static function postSubCategoryStore($request)
    {
        $post_sub_category = new postSubCategory;
        $data = $request->only('post_main_category_id', 'sub_category');
        $post_sub_category->fill($data)->save();
    }

    // サブカテゴリーの削除処理
    public static function postSubCategoryDestroy($id)
    {
        $post_sub_category = PostSubCategory::findOrFail($id);
        if ($post_sub_category->postIsExistence($post_sub_category)) {
            $post_sub_category->delete();
        }
        return \App::abort(404);
    }
}
