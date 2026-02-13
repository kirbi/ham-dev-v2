<?php
// database/migrations/2026_02_03_000006_create_infeksi_oportunistik_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('infeksi_oportunistik', function (Blueprint $table) {
            $table->id('id_infeksi_oportunistik');
            $table->string('nama', 100);
            $table->boolean('deleted')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('infeksi_oportunistik');
    }
};
