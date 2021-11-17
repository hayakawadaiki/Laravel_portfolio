<?php

namespace App\Http\Controllers\User\Post;

use App\Models\Posts\PostComment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostCommentFavoritesController extends Controller
{
    public function postCommentFavorite(Request $request)
    {
        $post_comment_id = $request->post_comment_id;
        $post_comment_favorite_id = $request->post_comment_favorite_id;

        PostComment::postCommentFavoriteCreateOrDestroy($post_comment_id, $post_comment_favorite_id);

        // 投稿のいいねの数を数えて返している
        $post_comment_favorite_count =
            PostComment::findOrFail($post_comment_id)->userPostCommentFavoriteRelations->count();

        return [$post_comment_favorite_id, $post_comment_favorite_count];
    }
}
