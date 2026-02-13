<?php
// database/seeders/StatusFungsionalSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusFungsionalSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('status_fungsional')->insert([
            ['nama' => 'Baik', 'deleted' => false],
            ['nama' => 'Sedang', 'deleted' => false],
            ['nama' => 'Buruk', 'deleted' => false],
        ]);
    }
}
