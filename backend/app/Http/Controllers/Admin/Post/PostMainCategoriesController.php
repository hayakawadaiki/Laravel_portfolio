<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Posts\PostMainCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostMainCategoryStoreRequest;
use Illuminate\Http\Request;

class PostMainCategoriesController extends Controller
{
    public function store(PostMainCategoryStoreRequest $request)
    {
        PostMainCategory::postMainCategoryStore($request);
        return back();
    }

    public function destroy($id)
    {
        PostMainCategory::postMainCategoryDestroy($id);
        return back();
    }
}
