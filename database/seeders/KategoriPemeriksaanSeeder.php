<?php
// database/seeders/KategoriPemeriksaanSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriPemeriksaanSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('kategori_pemeriksaan')->insert([
            ['nama' => 'Laboratorium', 'deleted' => false],
            ['nama' => 'Klinis', 'deleted' => false],
        ]);
    }
}
