<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void {
        Schema::create('riwayat_mitra_seksuals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pasien_id')->constrained('pasiens')->onDelete('cascade');
            $table->foreignId('status_hiv_id')->nullable()->constrained('status_hivs');
            $table->foreignId('hubungan_id')->nullable()->constrained('mitra_seksuals');
            $table->string('nama')->nullable();
            $table->integer('umur')->nullable();
            $table->integer('umur_bulan')->nullable();
            $table->string('no_reg_nasional')->nullable();
            $table->boolean('komsumsi_art')->default(false);
            $table->boolean('deleted')->default(false);
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('riwayat_mitra_seksuals'); }
};
