<?php

namespace App\Models\Posts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class Post extends Model
{
    protected $table = 'posts';

    protected $fillable = [
        'user_id',
        'post_sub_category_id',
        'title',
        'post',
        'event_at',
    ];

    protected $dates = ['event_at'];

    public function user()
    {
        return $this->belongsTo('App\Models\Users\User', 'user_id');
    }

    public function userPostFavoriteRelations()
    {
        return $this->belongsToMany('App\Models\Users\User', 'post_favorites', 'post_id', 'user_id');
    }

    public function postSubCategory()
    {
        return $this->belongsTo('App\Models\Posts\PostSubCategory', 'post_sub_category_id');
    }

    public function postComments()
    {
        return $this->hasMany('App\Models\Posts\PostComment');
    }

    public function actionLogs()
    {
        return $this->hasMany('App\Models\ActionLogs\ActionLog');
    }

    public static function postQuery()
    {
        return self::with([
            'user',
            'userPostFavoriteRelations',
            'postSubCategory',
            'postComments.postCommentFavorites',
            'postComments.user',
            'actionLogs',
        ]);
    }

    public static function postLists($request, $category_id)
    {
        $keyword = $request->keyword;

        $post_lists = self::postQuery();

        // カテゴリーを選択したときの処理
        if ($category_id) {
            $post_lists = $post_lists->where('post_sub_category_id', $category_id);
        }
        // 検索したときの処理
        if ($keyword) {
            $post_lists = $post_lists
                ->where('title', 'like', '%' . $keyword . '%')
                ->orWhere('post', 'like', '%' . $keyword . '%')
                ->orWhereIn('post_sub_category_id', function ($query) use ($keyword) {
                    $query->from('post_sub_categories')
                        ->select('id')
                        ->where('sub_category', $keyword);
                });
        }
        // いいねした投稿一覧を押したときの処理
        if ($request->post_favorite) {
            $post_lists = $post_lists
                ->orWhereIn('id', function ($query) {
                    $query->from('post_favorites')
                        ->select('post_id')
                        ->where('user_id', Auth::id());
                });
        }
        // 自分の投稿を押したときの処理
        if ($request->my_post) {
            $post_lists = $post_lists->where('user_id', Auth::id());
        }
        return $post_lists->get();
    }

    // 投稿詳細
    public static function postDetail($id)
    {
        return self::postQuery()->findOrFail($id);
    }

    // 投稿に対してのコメントがあるかどうかの判断（nullだったらtrueを返す）
    public static function postCommentIsExistence($post_detail)
    {
        return $post_detail->postComments->isEmpty();
    }

    // 投稿に対してログインしているユーザーがいいねしているかどうかの判断（nullだったらtrueを返す）
    public static function postFavoriteIsExistence($post_detail)
    {
        return is_null($post_detail->userPostFavoriteRelations->find(Auth::id()));
    }

    // 掲示板投稿処理
    public static function postStore($request)
    {
        $post_box = new Post;
        $data = $request->only('post_sub_category_id', 'title', 'post');
        $data['user_id'] = Auth::id();
        $data['event_at'] = new Carbon;
        return $post_box->fill($data)->save();
    }

    // 掲示更新処理
    public static function postUpdate($request, $post_detail)
    {
        $data = $request->only('post_sub_category_id', 'title', 'post');
        return $post_detail->fill($data)->save();
    }

    // 掲示板の投稿のいいね登録、削除処理
    public static function postFavoriteCreateOrDestroy($post_id, $post_favorite_id)
    {
        $post_detail = self::findOrFail($post_id);

        if ($post_favorite_id) {
            return $post_detail->userPostFavoriteRelations()->detach(Auth::id());
        } else {
            return $post_detail->userPostFavoriteRelations()->attach(Auth::id());
        }
    }
}
