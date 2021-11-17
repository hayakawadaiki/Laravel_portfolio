<?php

namespace App\Http\Controllers\User\Post;

use App\Models\Users\User;
use App\Models\Posts\PostComment;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostCommentStoreAndUpdateRequest;
use Illuminate\Http\Request;

class PostCommentsController extends Controller
{
    public function store(PostCommentStoreAndUpdateRequest $request, $id)
    {
        PostComment::postCommentStore($id, $request);
        return back();
    }

    public function edit($id)
    {
        $post_comment_detail = PostComment::findOrFail($id);
        if (User::contributorAndAdmin($post_comment_detail->user_id)) {
            return view('post_comment.user.edit', [
                'post_comment_detail' => $post_comment_detail,
            ]);
        }
        return \App::abort(403, 'Unauthorized action.');
    }

    public function update(PostCommentStoreAndUpdateRequest $request, $id)
    {
        $post_comment_detail = PostComment::findOrFail($id);
        if (User::contributorAndAdmin($post_comment_detail->user_id)) {
            $post_comment_detail->postCommentUpdate($request, $post_comment_detail);
            return redirect()->route('post.show', [$post_comment_detail->post_id]);
        }
        return \App::abort(403, 'Unauthorized action.');
    }

    public function destroy($id)
    {
        $post_comment_detail = PostComment::findOrFail($id);
        if (User::contributorAndAdmin($post_comment_detail->user_id)) {
            $post_comment_detail->delete();
            return redirect()->route('post.show', [$post_comment_detail->post_id]);
        }
        return \App::abort(403, 'Unauthorized action.');
    }
}
