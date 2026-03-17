<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('check_hivs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_tempat', 200)->nullable();
            $table->string('nama_kegiatan', 200);
            $table->text('deskripsi_kegiatan')->nullable();
            $table->date('tanggal_kegiatan');
            $table->unsignedInteger('hadir')->nullable();
            $table->foreignId('kabupaten_id')->nullable()->constrained('kabupatens');
            $table->foreignId('kecamatan_id')->nullable()->constrained('kecamatans');
            $table->unsignedInteger('jumlah_positif')->nullable();
            $table->unsignedInteger('jumlah_negatif')->nullable();
            $table->string('nama_narahubung', 150)->nullable();
            $table->string('kontak_narahubung', 50)->nullable();
            $table->boolean('deleted')->default(false);
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('check_hivs'); }
};
