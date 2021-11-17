<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Posts\PostSubCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostSubCategoryStoreRequest;
use Illuminate\Http\Request;

class PostSubCategoriesController extends Controller
{
    public function store(PostSubCategoryStoreRequest $request)
    {
        PostSubCategory::postSubCategoryStore($request);
        return back();
    }

    public function destroy($id)
    {
        PostSubCategory::postSubCategoryDestroy($id);
        return back();
    }
}
