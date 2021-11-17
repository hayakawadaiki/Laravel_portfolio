<?php

namespace Database\Seeders;

use App\Models\Posts\PostMainCategory;
use Illuminate\Database\Seeder;

class PostMainCategoriesTableSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i < 4; $i++) {
            PostMainCategory::create([
                'main_category' => 'メインカテゴリー' . $i,
            ]);
        }
    }
}
