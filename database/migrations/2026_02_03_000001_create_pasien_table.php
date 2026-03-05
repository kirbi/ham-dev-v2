<?php
// database/migrations/2026_02_03_000001_create_pasien_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pasiens', function (Blueprint $table) {
            $table->id();
            $table->string('no_reg_nasional')->nullable();
            $table->string('no_rekam_medis', 50)->nullable()->unique();
            $table->string('nik', 16)->nullable()->unique();
            $table->string('no_kk')->nullable();
            $table->string('no_bpjs')->nullable();
            $table->string('nama', 200);
            $table->date('tanggal_lahir');
            $table->string('jenis_kelamin');
            $table->string('tempat_lahir')->nullable();
            $table->text('alamat')->nullable();
            $table->string('no_hp', 20)->nullable();
            $table->foreignId('pendidikan_terakhir_id')->nullable()->constrained('pendidikans');
            $table->foreignId('pekerjaan_id')->nullable()->constrained('pekerjaans');
            $table->foreignId('status_pernikahan_id')->nullable()->constrained('status_pernikahans');
            $table->string('foto_pasien')->nullable();
            $table->foreignId('konselor_id')->nullable()->constrained('konselors');
            $table->foreignId('status_hiv_id')->nullable()->constrained('status_hivs');
            $table->date('tanggal_konfirmasi_hiv')->nullable();
            $table->string('tempat_konfirmasi_hiv')->nullable();
            $table->foreignId('entry_point_id')->nullable()->constrained('entry_points');
            $table->string('nama_pmo')->nullable();
            $table->text('alamat_pmo')->nullable();
            $table->string('hubungan_pmo')->nullable();
            $table->string('no_hp_pmo')->nullable();
            $table->foreignId('paduan_art_id')->nullable()->constrained('paduan_arts');
            $table->foreignId('iiart_id')->nullable()->constrained('indikasi_inisiasi_arts');
            $table->text('riwayat_alergi_obat')->nullable();
            $table->string('status_hiv')->nullable();
            $table->string('jenis_pasien')->nullable();
            $table->string('status_aktif')->nullable();
            $table->string('agama')->nullable();
            $table->string('tempat_tinggal')->nullable();
            $table->foreignId('provinsi_id')->nullable()->constrained('provinsis');
            $table->foreignId('kabupaten_id')->nullable()->constrained('kabupatens');
            $table->foreignId('kecamatan_id')->nullable()->constrained('kecamatans');
            $table->foreignId('desa_id')->nullable()->constrained('desas');
            $table->string('ibu_kandung')->nullable();
            $table->date('tanggal_rujuk_masuk')->nullable();
            $table->date('tanggal_rujuk_keluar')->nullable();
            $table->date('tanggal_konfirmasi_aids')->nullable();
            $table->string('tempat_konfirmasi_aids')->nullable();
            $table->date('tanggal_meninggal')->nullable();
            $table->date('tanggal_masuk')->nullable();
            $table->string('tempat_rujuk_keluar')->nullable();
            $table->string('tempat_rujuk_masuk')->nullable();
            $table->string('tempat_pdp')->nullable();
            $table->boolean('deleted')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pasiens');
    }
};
