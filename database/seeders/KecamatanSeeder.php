<?php
// database/seeders/KecamatanSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KecamatanSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('kecamatan')->insert([
            ['nama' => 'Cicendo', 'id_kabupaten' => 1, 'deleted' => false],
            ['nama' => 'Candisari', 'id_kabupaten' => 2, 'deleted' => false],
            ['nama' => 'Wonokromo', 'id_kabupaten' => 3, 'deleted' => false],
            ['nama' => 'Kebayoran Baru', 'id_kabupaten' => 4, 'deleted' => false],
        ]);
    }
}
