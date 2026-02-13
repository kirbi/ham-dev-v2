<?php
// database/seeders/KonselorSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KonselorSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('konselor')->insert([
            ['nama' => 'Konselor A', 'nip' => '12345', 'no_telepon' => '08123456789', 'email' => 'konselorA@example.com', 'deleted' => false],
            ['nama' => 'Konselor B', 'nip' => '67890', 'no_telepon' => '08129876543', 'email' => 'konselorB@example.com', 'deleted' => false],
        ]);
    }
}
