<?php

namespace Database\Seeders;

use App\Models\Posts\Post;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PostsTableSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i < 6; $i++) {
            Post::create([
                'user_id' => 6,
                'post_sub_category_id' => 1,
                'title' => '投稿' . $i,
                'post' => 'テストの投稿です',
                'event_at' => new Carbon,
            ]);
        }
        for ($i = 6; $i < 11; $i++) {
            Post::create([
                'user_id' => 7,
                'post_sub_category_id' => 2,
                'title' => '投稿' . $i,
                'post' => 'テストの投稿です',
                'event_at' => new Carbon,
            ]);
        }
        for ($i = 11; $i < 16; $i++) {
            Post::create([
                'user_id' => 8,
                'post_sub_category_id' => 3,
                'title' => '投稿' . $i,
                'post' => 'テストの投稿です',
                'event_at' => new Carbon,
            ]);
        }
        for ($i = 16; $i < 21; $i++) {
            Post::create([
                'user_id' => 9,
                'post_sub_category_id' => 4,
                'title' => '投稿' . $i,
                'post' => 'テストの投稿です',
                'event_at' => new Carbon,
            ]);
        }
        for ($i = 21; $i < 26; $i++) {
            Post::create([
                'user_id' => 10,
                'post_sub_category_id' => 5,
                'title' => '投稿' . $i,
                'post' => 'テストの投稿です',
                'event_at' => new Carbon,
            ]);
        }
        for ($i = 26; $i < 31; $i++) {
            Post::create([
                'user_id' => 11,
                'post_sub_category_id' => 6,
                'title' => '投稿' . $i,
                'post' => 'テストの投稿です',
                'event_at' => new Carbon,
            ]);
        }
    }
}
