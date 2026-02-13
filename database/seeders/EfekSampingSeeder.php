<?php
// database/seeders/EfekSampingSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EfekSampingSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('efek_samping')->insert([
            ['nama' => 'Mual', 'deleted' => false],
            ['nama' => 'Pusing', 'deleted' => false],
            ['nama' => 'Ruam', 'deleted' => false],
        ]);
    }
}
