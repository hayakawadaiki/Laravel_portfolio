<?php

namespace App\Http\Controllers\User\Post;

use App\Models\Users\User;
use App\Models\Posts\Post;
use App\Models\Posts\PostMainCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostStoreAndUpdateRequest;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index(Request $request, $category_id = null)
    {
        return view('post.user.index', [
            'category_id' => $category_id,
            'post_lists' => Post::postLists($request, $category_id),
            'post_main_categories' => PostMainCategory::postMainCategoryLists(),
        ]);
    }

    public function create()
    {
        return view('post.user.create', [
            'post_main_categories' => PostMainCategory::postMainCategoryLists(),
        ]);
    }

    public function store(PostStoreAndUpdateRequest $request)
    {
        Post::postStore($request);
        return redirect()->route('post.index');
    }

    public function show($id)
    {
        return view('post.user.show', [
            'post_detail' => Post::postDetail($id),
        ]);
    }

    public function edit($id)
    {
        $post_detail = Post::postDetail($id);
        if (User::contributorAndAdmin($post_detail->user_id)) {
            return view('post.user.edit', [
                'post_detail' => $post_detail,
                'post_main_categories' => PostMainCategory::postMainCategoryLists(),
            ]);
        }
        return \App::abort(403, 'Unauthorized action.');
    }

    public function update(PostStoreAndUpdateRequest $request, $id)
    {
        $post_detail = Post::postDetail($id);
        if (User::contributorAndAdmin($post_detail->user_id)) {
            $post_detail->postUpdate($request, $post_detail);
            return redirect()->route('post.show', [$id]);
        }
        return \App::abort(403, 'Unauthorized action.');
    }

    public function destroy($id)
    {
        $post_detail = Post::postDetail($id);
        if (User::contributorAndAdmin($post_detail->user_id)) {
            if ($post_detail->postCommentIsExistence($post_detail)) {
                $post_detail->delete();
                return redirect()->route('post.index');
            }
            return \App::abort(404);
        }
        return \App::abort(403, 'Unauthorized action.');
    }
}
