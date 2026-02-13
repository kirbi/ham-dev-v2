<?php
// database/seeders/PaduanArtSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaduanArtSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('paduan_art')->insert([
            ['nama' => 'Regimen 1', 'deleted' => false],
            ['nama' => 'Regimen 2', 'deleted' => false],
            ['nama' => 'Regimen 3', 'deleted' => false],
        ]);
    }
}
