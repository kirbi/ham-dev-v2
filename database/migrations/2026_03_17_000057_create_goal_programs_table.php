<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('goal_programs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('program_kerja_id')->nullable()->constrained('program_kerjas');
            $table->string('nama', 200)->nullable();
            $table->text('deskripsi')->nullable();
            $table->unsignedInteger('target')->nullable();
            $table->unsignedInteger('realisasi')->nullable();
            $table->boolean('deleted')->default(false);
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('goal_programs'); }
};
