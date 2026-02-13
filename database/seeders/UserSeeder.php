<?php
// database/seeders/UserSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'email' => 'admin@ham-dev.com',
                'password' => Hash::make('password'),
                'type' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Konselor',
                'email' => 'konselor@ham-dev.com',
                'password' => Hash::make('password'),
                'type' => 'konselor',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Dokter',
                'email' => 'dokter@ham-dev.com',
                'password' => Hash::make('password'),
                'type' => 'dokter',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
