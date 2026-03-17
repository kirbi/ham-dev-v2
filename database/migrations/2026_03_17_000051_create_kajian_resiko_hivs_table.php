<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('kajian_resiko_hivs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('konseling_hiv_id')->constrained('konseling_hivs')->onDelete('cascade');
            $table->date('tanggal')->nullable();
            $table->foreignId('tingkat_resiko_hiv_id')->nullable()->constrained('tingkat_resiko_hivs');
            $table->boolean('deleted')->default(false);
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('kajian_resiko_hivs'); }
};
