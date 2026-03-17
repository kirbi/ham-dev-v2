<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('info_tes_hiv_konselings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('konseling_hiv_id')->constrained('konseling_hivs')->onDelete('cascade');
            $table->foreignId('info_tes_hiv_id')->constrained('info_tes_hivs');
            $table->boolean('deleted')->default(false);
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('info_tes_hiv_konselings'); }
};
