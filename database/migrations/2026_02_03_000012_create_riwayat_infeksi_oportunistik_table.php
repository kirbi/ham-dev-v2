<?php
// database/migrations/2026_02_03_000012_create_riwayat_infeksi_oportunistik_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('riwayat_infeksi_oportunistiks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('riwayat_perawatan_pasien_id')->constrained('riwayat_perawatan_pasiens')->onDelete('cascade');
            $table->foreignId('infeksi_oportunistik_id')->constrained('infeksi_oportunistiks')->onDelete('cascade');
            $table->timestamps();
            $table->unique(['riwayat_perawatan_pasien_id', 'infeksi_oportunistik_id'], 'riwayat_infeksi_oportunistik_unique');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('riwayat_infeksi_oportunistiks');
    }
};
