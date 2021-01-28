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
        User::create(
            [
                'name' => 'Dusan',
                'surname' => 'Krsmanovic',
                'email' => 'dusan@admin.com',
                'password' => sha1('dusan1995'),
                'role_id' => 1
            ],
        );
        User::create(
            [
                'name' => 'Pera',
                'surname' => 'Peric',
                'email' => 'pera@user.com',
                'password' => sha1('dusan1995'),
                'role_id' => 2
            ]
        );

    }
}
