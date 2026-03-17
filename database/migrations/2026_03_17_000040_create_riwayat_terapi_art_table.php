<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('riwayat_terapi_art', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pasien_id')->constrained('pasiens')->onDelete('cascade');
            $table->boolean('pernah_menerima')->default(false);
            $table->foreignId('jenis_terapi_id')->nullable()->constrained('jenis_terapis');
            $table->foreignId('tempat_terapi_id')->nullable()->constrained('tempat_terapis');
            $table->foreignId('paduan_art_id')->nullable()->constrained('paduan_art');
            $table->string('dosis_art', 100)->nullable();
            $table->string('lama_penggunaan', 100)->nullable();
            $table->boolean('deleted')->default(false);
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('riwayat_terapi_art'); }
};
