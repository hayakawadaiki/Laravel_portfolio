<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            UsersTableSeeder::class,
            PostMainCategoriesTableSeeder::class,
            PostSubCategoriesTableSeeder::class,
            PostsTableSeeder::class,
            PostCommentsTableSeeder::class,
        ]);
    }
}
