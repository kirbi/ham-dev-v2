<?php
// database/seeders/DesaSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DesaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('desa')->insert([
            ['nama' => 'Sukajadi', 'id_kecamatan' => 1, 'deleted' => false],
            ['nama' => 'Jatingaleh', 'id_kecamatan' => 2, 'deleted' => false],
            ['nama' => 'Darmo', 'id_kecamatan' => 3, 'deleted' => false],
            ['nama' => 'Gandaria', 'id_kecamatan' => 4, 'deleted' => false],
        ]);
    }
}
