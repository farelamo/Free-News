<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = [
            [
                'role' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => 'password',
                'is_verified' => true,
                // 'profile_id' => ,
            ]
        ];

        foreach ($datas as $data) {
            User::create($data);
        }
    }
}
