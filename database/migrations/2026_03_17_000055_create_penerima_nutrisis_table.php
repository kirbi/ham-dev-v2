<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('penerima_nutrisis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pasien_id')->nullable()->constrained('pasiens')->onDelete('cascade');
            $table->string('jenis_nutrisi', 100)->nullable();
            $table->string('jumlah', 50)->nullable();
            $table->date('tanggal')->nullable();
            $table->text('keterangan')->nullable();
            $table->boolean('deleted')->default(false);
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('penerima_nutrisis'); }
};
