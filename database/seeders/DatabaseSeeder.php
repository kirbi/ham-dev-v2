<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name'     => 'Administrator',
            'email'    => 'admin@ham.local',
            'type'     => 'admin',
            'password' => bcrypt('admin123'),
        ]);

        User::factory()->create([
            'name'     => 'Konselor',
            'email'    => 'konselor@ham.local',
            'type'     => 'konselor',
            'password' => bcrypt('konselor123'),
        ]);
    }
}
