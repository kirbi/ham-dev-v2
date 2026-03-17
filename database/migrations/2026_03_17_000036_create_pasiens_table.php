<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('pasiens', function (Blueprint $table) {
            $table->id();
            $table->string('no_reg_nasional', 50)->nullable();
            $table->string('no_rekam_medis', 50)->nullable()->unique();
            $table->string('nik', 20)->nullable()->unique();
            $table->string('no_kk', 20)->nullable();
            $table->string('no_bpjs', 30)->nullable();
            $table->string('nama', 200);
            $table->enum('jenis_kelamin', ['L', 'P'])->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('tempat_lahir', 100)->nullable();
            $table->text('alamat')->nullable();
            $table->string('no_hp', 20)->nullable();
            $table->foreignId('pendidikan_id')->nullable()->constrained('pendidikans');
            $table->foreignId('pekerjaan_id')->nullable()->constrained('pekerjaans');
            $table->foreignId('status_pernikahan_id')->nullable()->constrained('status_pernikahans');
            $table->string('foto_pasien', 255)->nullable();
            $table->foreignId('konselor_id')->nullable()->constrained('konselors');
            $table->foreignId('status_hiv_id')->nullable()->constrained('status_hivs');
            $table->date('tanggal_konfirmasi_hiv')->nullable();
            $table->string('tempat_konfirmasi_hiv', 200)->nullable();
            $table->foreignId('entry_point_id')->nullable()->constrained('entry_points');
            $table->string('nama_pmo', 150)->nullable();
            $table->string('alamat_pmo', 255)->nullable();
            $table->string('hubungan_pmo', 50)->nullable();
            $table->string('no_hp_pmo', 20)->nullable();
            $table->foreignId('paduan_art_id')->nullable()->constrained('paduan_art');
            $table->text('riwayat_alergi_obat')->nullable();
            $table->string('status_hiv', 50)->nullable();
            $table->string('jenis_pasien', 50)->nullable();
            $table->string('status_aktif', 30)->default('Aktif');
            $table->string('agama', 30)->nullable();
            $table->string('tempat_tinggal', 100)->nullable();
            $table->foreignId('provinsi_id')->nullable()->constrained('provinsis');
            $table->foreignId('kabupaten_id')->nullable()->constrained('kabupatens');
            $table->foreignId('kecamatan_id')->nullable()->constrained('kecamatans');
            $table->foreignId('desa_id')->nullable()->constrained('desas');
            $table->string('ibu_kandung', 150)->nullable();
            $table->date('tanggal_rujuk_masuk')->nullable();
            $table->date('tanggal_rujuk_keluar')->nullable();
            $table->string('tempat_rujuk_masuk', 200)->nullable();
            $table->string('tempat_rujuk_keluar', 200)->nullable();
            $table->date('tanggal_konfirmasi_aids')->nullable();
            $table->string('tempat_konfirmasi_aids', 200)->nullable();
            $table->date('tanggal_meninggal')->nullable();
            $table->date('tanggal_masuk')->nullable();
            $table->string('tempat_pdp', 200)->nullable();
            $table->boolean('deleted')->default(false);
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('pasiens'); }
};
