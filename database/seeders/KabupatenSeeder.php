<?php
// database/seeders/KabupatenSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KabupatenSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('kabupaten')->insert([
            ['nama' => 'Bandung', 'id_provinsi' => 1, 'deleted' => false],
            ['nama' => 'Semarang', 'id_provinsi' => 2, 'deleted' => false],
            ['nama' => 'Surabaya', 'id_provinsi' => 3, 'deleted' => false],
            ['nama' => 'Jakarta Selatan', 'id_provinsi' => 4, 'deleted' => false],
        ]);
    }
}
