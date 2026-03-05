<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengobatan_tb_hivs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pasien_id')->constrained('pasiens')->onDelete('cascade');
            $table->foreignId('tipe_tb_id')->nullable()->constrained('tipe_tbs');
            $table->unsignedBigInteger('klasifikasi_tb_id')->nullable();
            $table->foreignId('paduan_tb_id')->nullable()->constrained('paduan_tbs');
            $table->foreignId('kabupaten_pengobatan_id')->nullable()->constrained('kabupatens');
            $table->string('nama_sarana_kesehatan')->nullable();
            $table->string('no_reg_tb')->nullable();
            $table->date('tanggal_mulai_terapi')->nullable();
            $table->date('tanggal_selesai_terapi')->nullable();
            $table->string('lokasi_tb')->nullable();
            $table->boolean('deleted')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengobatan_tb_hivs');
    }
};