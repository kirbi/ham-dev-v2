<?php
// database/migrations/2026_02_03_000002_create_riwayat_perawatan_pasien_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('riwayat_perawatan_pasien', function (Blueprint $table) {
            $table->id('id_riwayat_perawatan_pasien');
            $table->foreignId('id_pasien')->constrained('pasien', 'id_pasien')->onDelete('cascade');
            $table->date('tanggal_pengobatan');
            $table->decimal('berat_badan', 5, 2)->nullable();
            $table->decimal('tinggi_badan', 5, 2)->nullable();
            $table->string('tekanan_darah', 20)->nullable();
            $table->string('stadium_who', 50)->nullable();
            $table->foreignId('id_status_tb')->nullable()->constrained('status_tb', 'id_status_tb');
            $table->foreignId('id_paduan_art')->constrained('paduan_art', 'id_paduan_art');
            $table->foreignId('id_adherence_art')->nullable()->constrained('adherence_art', 'id_adherence_art');
            $table->integer('sisa_obat')->nullable();
            $table->boolean('diberi_kondom')->default(false);
            $table->foreignId('id_status_fungsional')->nullable()->constrained('status_fungsional', 'id_status_fungsional');
            $table->integer('jumlah_cd4')->nullable();
            $table->integer('viral_load')->nullable();
            $table->date('rencana_kunjungan_selanjutnya')->nullable();
            $table->text('catatan')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->index('id_pasien');
            $table->index('tanggal_pengobatan');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('riwayat_perawatan_pasien');
    }
};
