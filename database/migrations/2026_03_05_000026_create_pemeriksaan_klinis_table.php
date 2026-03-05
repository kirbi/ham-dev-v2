<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void {
        Schema::create('pemeriksaan_klinis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pasien_id')->constrained('pasiens')->onDelete('cascade');
            $table->foreignId('kategori_pemeriksaan_id')->nullable()->constrained('kategori_pemeriksaans');
            $table->foreignId('status_fungsional_id')->nullable()->constrained('status_fungsionals');
            $table->date('tanggal_pemeriksaan')->nullable();
            $table->text('hasil_pemeriksaan')->nullable();
            $table->boolean('deleted')->default(false);
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('pemeriksaan_klinis'); }
};
