<?php
// database/migrations/2026_02_03_000016_create_kategori_pemeriksaan_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kategori_pemeriksaans', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 100);
            $table->boolean('deleted')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kategori_pemeriksaans');
    }
};
