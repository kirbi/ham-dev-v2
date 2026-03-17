<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('pasien_files', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pasien_id')->constrained('pasiens')->onDelete('cascade');
            $table->string('nama', 200)->nullable();
            $table->string('berkas', 255)->nullable();
            $table->string('path', 500)->nullable();
            $table->boolean('deleted')->default(false);
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('pasien_files'); }
};
