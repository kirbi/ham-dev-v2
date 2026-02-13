<?php
// database/migrations/2026_02_03_000012_create_riwayat_infeksi_oportunistik_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('riwayat_infeksi_oportunistik', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_riwayat_perawatan_pasien')->constrained('riwayat_perawatan_pasien', 'id_riwayat_perawatan_pasien')->onDelete('cascade');
            $table->foreignId('id_infeksi_oportunistik')->constrained('infeksi_oportunistik', 'id_infeksi_oportunistik')->onDelete('cascade');
            $table->timestamps();
            $table->unique(['id_riwayat_perawatan_pasien', 'id_infeksi_oportunistik'], 'riwayat_infeksi_oportunistik_unique');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('riwayat_infeksi_oportunistik');
    }
};
