<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void {
        Schema::create('check_hivs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kabupaten_id')->nullable()->constrained('kabupatens');
            $table->foreignId('kecamatan_id')->nullable()->constrained('kecamatans');
            $table->string('nama_tempat')->nullable();
            $table->string('nama_kegiatan')->nullable();
            $table->text('deskripsi_kegiatan')->nullable();
            $table->date('tanggal_kegiatan')->nullable();
            $table->integer('hadir')->nullable();
            $table->integer('jumlah_positif')->nullable();
            $table->integer('jumlah_negatif')->nullable();
            $table->string('nama_narahubung')->nullable();
            $table->string('kontak_narahubung')->nullable();
            $table->boolean('deleted')->default(false);
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('check_hivs'); }
};
