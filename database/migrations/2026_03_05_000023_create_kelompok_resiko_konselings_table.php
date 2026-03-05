<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void {
        Schema::create('kelompok_resiko_konselings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('konseling_id')->nullable()->constrained('konseling_hivs');
            $table->foreignId('kelompok_resiko_id')->nullable()->constrained('kelompok_resikos');
            $table->integer('lama_tahun')->nullable();
            $table->integer('lama_bulan')->nullable();
            $table->boolean('deleted')->default(false);
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('kelompok_resiko_konselings'); }
};
