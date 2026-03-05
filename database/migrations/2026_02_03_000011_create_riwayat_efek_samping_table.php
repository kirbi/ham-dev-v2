<?php
// database/migrations/2026_02_03_000011_create_riwayat_efek_samping_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('riwayat_efek_sampings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('riwayat_perawatan_pasien_id')->constrained('riwayat_perawatan_pasiens')->onDelete('cascade');
            $table->foreignId('efek_samping_id')->constrained('efek_sampings')->onDelete('cascade');
            $table->timestamps();
            $table->unique(['riwayat_perawatan_pasien_id', 'efek_samping_id'], 'riwayat_efek_samping_unique');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('riwayat_efek_sampings');
    }
};
