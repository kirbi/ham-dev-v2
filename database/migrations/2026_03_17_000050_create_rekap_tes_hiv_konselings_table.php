<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('rekap_tes_hiv_konselings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('konseling_hiv_id')->constrained('konseling_hivs')->onDelete('cascade');
            $table->string('tempat_tes', 200)->nullable();
            $table->date('tanggal')->nullable();
            $table->string('hasil', 50)->nullable();
            $table->boolean('deleted')->default(false);
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('rekap_tes_hiv_konselings'); }
};
