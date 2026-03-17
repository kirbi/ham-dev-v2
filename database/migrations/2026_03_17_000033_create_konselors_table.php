<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('konselors', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 150);
            $table->string('nik', 20)->nullable();
            $table->string('nip', 30)->nullable();
            $table->string('no_hp', 20)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('alamat', 255)->nullable();
            $table->enum('jenis_kelamin', ['L', 'P'])->nullable();
            $table->string('tempat_lahir', 100)->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->foreignId('pendidikan_id')->nullable()->constrained('pendidikans');
            $table->date('tanggal_sertifikasi')->nullable();
            $table->string('status_pegawai', 50)->nullable();
            $table->foreignId('status_pernikahan_id')->nullable()->constrained('status_pernikahans');
            $table->boolean('deleted')->default(false);
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('konselors'); }
};
