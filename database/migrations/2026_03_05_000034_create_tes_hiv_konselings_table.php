<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void {
        Schema::create('tes_hiv_konselings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('konseling_id')->nullable()->constrained('konseling_hivs');
            $table->string('tes_r1')->nullable();
            $table->string('tes_r2')->nullable();
            $table->string('tes_r3')->nullable();
            $table->string('reagen_r1')->nullable();
            $table->string('reagen_r2')->nullable();
            $table->string('reagen_r3')->nullable();
            $table->string('jenis_tes')->nullable();
            $table->date('tanggal_tes')->nullable();
            $table->string('hasil')->nullable();
            $table->boolean('deleted')->default(false);
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('tes_hiv_konselings'); }
};
