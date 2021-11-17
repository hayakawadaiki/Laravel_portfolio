<?php

namespace Database\Seeders;

use App\Models\Posts\PostSubCategory;
use Illuminate\Database\Seeder;

class PostSubCategoriesTableSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i < 2; $i++) {
            PostSubCategory::create([
                'post_main_category_id' => 1,
                'sub_category' => 'サブカテゴリー' . $i,
            ]);
        }
        for ($i = 2; $i < 4; $i++) {
            PostSubCategory::create([
                'post_main_category_id' => 2,
                'sub_category' => 'サブカテゴリー' . $i,
            ]);
        }
        for ($i = 4; $i < 7; $i++) {
            PostSubCategory::create([
                'post_main_category_id' => 3,
                'sub_category' => 'サブカテゴリー' . $i,
            ]);
        }
    }
}
