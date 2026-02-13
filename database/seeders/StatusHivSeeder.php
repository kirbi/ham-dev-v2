<?php
// database/seeders/StatusHivSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusHivSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('status_hiv')->insert([
            ['nama' => 'Negatif', 'deleted' => false],
            ['nama' => 'Positif', 'deleted' => false],
            ['nama' => 'Tidak Diketahui', 'deleted' => false],
        ]);
    }
}
