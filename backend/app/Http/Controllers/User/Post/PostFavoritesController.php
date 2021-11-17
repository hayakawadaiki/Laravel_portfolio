<?php

namespace App\Http\Controllers\User\Post;

use App\Models\Posts\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Log;

class PostFavoritesController extends Controller
{
    public function postFavorite(Request $request)
    {
        $post_id = $request->post_id;
        $post_favorite_id = $request->post_favorite_id;
        Post::postFavoriteCreateOrDestroy($post_id, $post_favorite_id);

        // 投稿のいいねの数を数えて返している
        $post_favorite_count = Post::postDetail($post_id)->userPostFavoriteRelations->count();

        return [$post_favorite_id, $post_favorite_count];
    }
}
