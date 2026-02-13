<?php
// database/seeders/StatusTbSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusTbSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('status_tb')->insert([
            ['nama' => 'Negatif', 'deleted' => false],
            ['nama' => 'Positif', 'deleted' => false],
            ['nama' => 'Tidak Diketahui', 'deleted' => false],
        ]);
    }
}
