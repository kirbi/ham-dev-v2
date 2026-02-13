<?php
// database/seeders/JenisTerapiSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisTerapiSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('jenis_terapi')->insert([
            ['nama' => 'ART', 'deleted' => false],
            ['nama' => 'Profilaksis', 'deleted' => false],
        ]);
    }
}
