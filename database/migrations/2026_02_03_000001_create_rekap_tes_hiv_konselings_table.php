<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('rekap_tes_hiv_konselings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pasien_id')->nullable()->constrained('pasiens')->onDelete('cascade');
            $table->foreignId('konseling_id')->nullable()->constrained('konseling_hivs');
            $table->date('tanggal_tes')->nullable();
            $table->string('hasil_tes')->nullable();
            $table->boolean('deleted')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rekap_tes_hiv_konselings');
    }
};