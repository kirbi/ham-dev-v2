<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Admin User',
                'email' => 'Kirbi.rio@gmail.com',
                'type' => 1,
                'password' => bcrypt('nanonano'),
            ],
            [
                'name' => 'Konselo User',
                'email' => 'konselor@gmail.com',
                'type' => 2,
                'password' => bcrypt('konselor'),
            ],
            [
                'name' => 'Super Admin User',
                'email' => 'sa@gmail.com',
                'type' => 3,
                'password' => bcrypt('nanonanosa'),
            ],
            [
                'name' => 'User',
                'email' => 'user@gmail.com',
                'type' => 0,
                'password' => bcrypt('user'),
            ],
        ];

        foreach($users as $user){
            User::create($user);
        }
    }
}
