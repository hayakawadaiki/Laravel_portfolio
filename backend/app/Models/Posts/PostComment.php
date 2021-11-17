<?php

namespace App\Models\Posts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class PostComment extends Model
{
    protected $table = 'post_comments';

    protected $fillable = [
        'user_id',
        'post_id',
        'comment',
        'event_at',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\Users\User', 'user_id');
    }

    public function postCommentFavorites()
    {
        return $this->hasMany('App\Models\Posts\PostCommentFavorite');
    }

    public function userPostCommentFavoriteRelations()
    {
        return $this->belongsToMany('App\Models\Users\User', 'post_comment_favorites', 'post_comment_id', 'user_id');
    }

    public static function postCommentFavoriteIsExistence($post_comment)
    {
        return $post_comment->postCommentFavorites->where('user_id', Auth::id())->isEmpty();
    }

    // 掲示板コメント投稿処理
    public static function postCommentStore($id, $request)
    {
        $post_comment = new PostComment;
        $data = $request->only('comment');
        $data['user_id'] = Auth::id();
        $data['post_id'] = $id;
        $data['event_at'] = new Carbon;
        return $post_comment->fill($data)->save();
    }

    // 掲示板コメント投稿、更新処理
    public function postCommentUpdate($request, $post_comment_detail)
    {
        $data = $request->only('post_id', 'comment');
        return $post_comment_detail->fill($data)->save();
    }

    // 掲示板の投稿のいいね登録、削除処理
    public static function postCommentFavoriteCreateOrDestroy($post_comment_id, $post_comment_favorite_id)
    {
        $post_comment_detail = self::findOrFail($post_comment_id);
        if ($post_comment_favorite_id) {
            return $post_comment_detail->userPostCommentFavoriteRelations()->detach(Auth::id());
        } else {
            return $post_comment_detail->userPostCommentFavoriteRelations()->attach(Auth::id());
        }
    }
}
