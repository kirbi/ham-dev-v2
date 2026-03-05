<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void {
        Schema::create('terapi_art_pasiens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pasien_id')->constrained('pasiens')->onDelete('cascade');
            $table->foreignId('paduan_art_id')->nullable()->constrained('paduan_arts');
            $table->foreignId('alasan_id')->nullable()->constrained('alasan_substitusis');
            $table->date('tanggal_mulai')->nullable();
            $table->string('fase')->nullable();
            $table->text('penjelasan')->nullable();
            $table->boolean('deleted')->default(false);
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('terapi_art_pasiens'); }
};
