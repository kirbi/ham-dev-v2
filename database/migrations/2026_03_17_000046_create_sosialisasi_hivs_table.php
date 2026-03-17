<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('sosialisasi_hivs', function (Blueprint $table) {
            $table->id();
            $table->string('tempat_kegiatan', 200)->nullable();
            $table->string('nama_kegiatan', 200);
            $table->string('target_kegiatan', 200)->nullable();
            $table->date('tanggal_kegiatan');
            $table->unsignedInteger('peserta_hadir')->nullable();
            $table->foreignId('kabupaten_id')->nullable()->constrained('kabupatens');
            $table->foreignId('kecamatan_id')->nullable()->constrained('kecamatans');
            $table->string('nama_narahubung', 150)->nullable();
            $table->string('kontak_narahubung', 50)->nullable();
            $table->boolean('deleted')->default(false);
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('sosialisasi_hivs'); }
};
