<?php
// database/migrations/2026_02_03_000018_create_desa_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('desa', function (Blueprint $table) {
            $table->id('id_desa');
            $table->string('nama', 100);
            $table->foreignId('id_kecamatan')->constrained('kecamatan', 'id_kecamatan');
            $table->boolean('deleted')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('desa');
    }
};
