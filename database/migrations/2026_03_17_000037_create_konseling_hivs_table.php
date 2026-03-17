<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('konseling_hivs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pasien_id')->constrained('pasiens')->onDelete('cascade');
            $table->foreignId('kabupaten_id')->nullable()->constrained('kabupatens');
            $table->foreignId('konselor_id')->nullable()->constrained('konselors');
            $table->foreignId('pendidikan_id')->nullable()->constrained('pendidikans');
            $table->foreignId('pekerjaan_id')->nullable()->constrained('pekerjaans');
            $table->foreignId('status_pernikahan_id')->nullable()->constrained('status_pernikahans');
            $table->text('alamat')->nullable();
            $table->date('tanggal_konseling');
            $table->string('no_registrasi', 50)->nullable();
            $table->boolean('ada_pasangan_perempuan')->nullable();
            $table->boolean('pasangan_hamil')->nullable();
            $table->unsignedTinyInteger('jumlah_pasangan_laki_laki')->nullable();
            $table->unsignedTinyInteger('jumlah_anak_kandung')->nullable();
            $table->unsignedSmallInteger('umur_anak_terakhir')->nullable();
            $table->string('status_kehamilan', 50)->nullable();
            $table->date('tanggal_konseling_pasca_tes_hiv')->nullable();
            $table->string('status_pasien', 50)->nullable();
            $table->date('tanggal_konseling_pra_tes_hiv')->nullable();
            $table->boolean('pernah_tes_hiv_sebelumnya')->nullable();
            $table->boolean('kesediaan_tes_hiv')->nullable();
            $table->text('catatan_konseling')->nullable();
            $table->boolean('deleted')->default(false);
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('konseling_hivs'); }
};
