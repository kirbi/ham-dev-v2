<?php
// database/seeders/AdherenceArtSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdherenceArtSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('adherence_art')->insert([
            ['nama' => 'Baik', 'deleted' => false],
            ['nama' => 'Cukup', 'deleted' => false],
            ['nama' => 'Kurang', 'deleted' => false],
        ]);
    }
}
