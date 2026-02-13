<?php
// database/seeders/ProvinsiSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvinsiSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('provinsi')->insert([
            ['nama' => 'Jawa Barat', 'deleted' => false],
            ['nama' => 'Jawa Tengah', 'deleted' => false],
            ['nama' => 'Jawa Timur', 'deleted' => false],
            ['nama' => 'DKI Jakarta', 'deleted' => false],
        ]);
    }
}
