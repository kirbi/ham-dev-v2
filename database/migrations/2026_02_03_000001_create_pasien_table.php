<?php
// database/migrations/2026_02_03_000001_create_pasien_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pasien', function (Blueprint $table) {
            $table->id('id_pasien');
            $table->string('no_rekam_medis', 50)->unique();
            $table->string('nik', 16)->nullable()->unique();
            $table->string('nama', 200);
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->text('alamat')->nullable();
            $table->string('no_telepon', 20)->nullable();
            $table->string('status', 20)->default('aktif'); // aktif, tidak_aktif, meninggal
            $table->timestamps();
            $table->softDeletes();
            $table->index('no_rekam_medis');
            $table->index('status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pasien');
    }
};
