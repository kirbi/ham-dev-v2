<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('pemeriksaan_klinis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pasien_id')->constrained('pasiens')->onDelete('cascade');
            $table->date('tanggal_pemeriksaan');
            $table->decimal('berat_badan', 5, 2)->nullable();
            $table->foreignId('status_fungsional_id')->nullable()->constrained('status_fungsionals');
            $table->unsignedInteger('jumlah_cd4')->nullable();
            $table->text('lain_lain')->nullable();
            $table->text('standar_klinis')->nullable();
            $table->foreignId('kategori_pemeriksaan_id')->nullable()->constrained('kategori_pemeriksaans');
            $table->date('tanggal_pemeriksaan_selanjutnya')->nullable();
            $table->string('viral_load', 50)->nullable();
            $table->boolean('deleted')->default(false);
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('pemeriksaan_klinis'); }
};
