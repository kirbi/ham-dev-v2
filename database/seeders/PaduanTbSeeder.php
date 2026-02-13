<?php
// database/seeders/PaduanTbSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaduanTbSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('paduan_tb')->insert([
            ['nama' => 'Kategori 1', 'deleted' => false],
            ['nama' => 'Kategori 2', 'deleted' => false],
        ]);
    }
}
