<?php
// database/seeders/InfeksiOportunistikSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InfeksiOportunistikSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('infeksi_oportunistik')->insert([
            ['nama' => 'TBC', 'deleted' => false],
            ['nama' => 'Pneumonia', 'deleted' => false],
            ['nama' => 'Candidiasis', 'deleted' => false],
        ]);
    }
}
