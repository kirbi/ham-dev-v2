<?php
// database/migrations/2026_02_03_000011_create_riwayat_efek_samping_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('riwayat_efek_samping', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_riwayat_perawatan_pasien')->constrained('riwayat_perawatan_pasien', 'id_riwayat_perawatan_pasien')->onDelete('cascade');
            $table->foreignId('id_efek_samping')->constrained('efek_samping', 'id_efek_samping')->onDelete('cascade');
            $table->timestamps();
            $table->unique(['id_riwayat_perawatan_pasien', 'id_efek_samping'], 'riwayat_efek_samping_unique');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('riwayat_efek_samping');
    }
};
