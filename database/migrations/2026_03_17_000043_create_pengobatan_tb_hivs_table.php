<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('pengobatan_tb_hivs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pasien_id')->constrained('pasiens')->onDelete('cascade');
            $table->foreignId('tipe_tb_id')->nullable()->constrained('tipe_tbs');
            $table->foreignId('klasifikasi_tb_id')->nullable()->constrained('klasifikasi_tbs');
            $table->foreignId('paduan_tb_id')->nullable()->constrained('paduan_tbs');
            $table->foreignId('kabupaten_id')->nullable()->constrained('kabupatens');
            $table->string('nama_sarana_kesehatan', 200)->nullable();
            $table->string('no_reg_tb', 50)->nullable();
            $table->date('tanggal_mulai_terapi')->nullable();
            $table->date('tanggal_selesai_terapi')->nullable();
            $table->string('lokasi_tb', 100)->nullable();
            $table->boolean('deleted')->default(false);
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('pengobatan_tb_hivs'); }
};
