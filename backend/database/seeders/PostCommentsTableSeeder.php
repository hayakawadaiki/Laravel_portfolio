<?php

namespace Database\Seeders;

use App\Models\Posts\PostComment;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PostCommentsTableSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i < 300; $i++) {
            PostComment::create([
                'user_id' => mt_rand(1, 11),
                'post_id' => mt_rand(1, 30),
                'comment' => 12341234123412341234,
                'event_at' => new Carbon,
            ]);
        }
    }
}
