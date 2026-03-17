<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('status_fungsionals', function (Blueprint $table) {
            $table->id();
            $table->string('kode', 20)->nullable();
            $table->string('nama', 100);
            $table->text('deskripsi')->nullable();
            $table->boolean('deleted')->default(false);
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('status_fungsionals'); }
};
