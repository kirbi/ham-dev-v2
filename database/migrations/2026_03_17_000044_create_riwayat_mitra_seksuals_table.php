<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('riwayat_mitra_seksuals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pasien_id')->constrained('pasiens')->onDelete('cascade');
            $table->string('nama', 150)->nullable();
            $table->unsignedSmallInteger('umur')->nullable();
            $table->string('umur_bulan', 20)->nullable();
            $table->foreignId('mitra_seksual_id')->nullable()->constrained('mitra_seksuals');
            $table->string('no_reg_nasional', 50)->nullable();
            $table->foreignId('status_hiv_id')->nullable()->constrained('status_hivs');
            $table->boolean('komsumsi_art')->nullable();
            $table->boolean('deleted')->default(false);
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('riwayat_mitra_seksuals'); }
};
