<?php

namespace Database\Seeders;

use App\Models\Users\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i < 11; $i++) {
            User::create([
                'username' => 'テストユーザー' . $i,
                'email' => 'test' . $i . '@gmail.com',
                'password' => bcrypt($i . 'hayakawa'),
            ]);
        }

        User::create([
            'username' => 'adminテストユーザー' . 11,
            'email' => 'admin_test11' . '@gmail.com',
            'password' => bcrypt(11 . 'hayakawa'),
            'admin_role' => 1,
        ]);
    }
}
