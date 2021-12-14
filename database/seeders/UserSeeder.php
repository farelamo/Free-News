<?php

namespace Database\Seeders;

use App\Models\Profile;
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
                'is_verified' => true
            ]
        ];

        foreach ($datas as $data) {
            $profile = Profile::factory()->create();
            $data['profile_id'] = $profile->id;
            User::create($data);
        }
    }
}
