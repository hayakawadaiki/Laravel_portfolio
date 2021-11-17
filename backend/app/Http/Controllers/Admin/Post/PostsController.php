<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Posts\PostMainCategory;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{
    public function postCategoryIndex()
    {
        return view('post_category.admin.index', [
            'post_main_categories' => PostMainCategory::postMainCategoryLists(),
        ]);
    }
}
