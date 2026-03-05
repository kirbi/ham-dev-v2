<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('riwayat_perawatan_pasiens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pasien_id')->constrained('pasiens')->onDelete('cascade');
            $table->date('tanggal_pengobatan');
            $table->decimal('berat_badan', 5, 2)->nullable();
            $table->decimal('tinggi_badan', 5, 2)->nullable();
            $table->string('tekanan_darah', 20)->nullable();
            $table->string('stadium_who', 50)->nullable();
            $table->foreignId('status_tb_id')->nullable()->constrained('status_tbs');
            $table->foreignId('paduan_art_id')->constrained('paduan_arts');
            $table->foreignId('adherence_art_id')->nullable()->constrained('adherence_arts');
            $table->integer('sisa_obat')->nullable();
            $table->boolean('diberi_kondom')->default(false);
            $table->foreignId('status_fungsional_id')->nullable()->constrained('status_fungsionals');
            $table->integer('jumlah_cd4')->nullable();
            $table->integer('viral_load')->nullable();
            $table->date('rencana_kunjungan_selanjutnya')->nullable();
            $table->text('catatan')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->index('pasien_id');
            $table->index('tanggal_pengobatan');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('riwayat_perawatan_pasiens');
    }
};
