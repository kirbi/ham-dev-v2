<?php
// database/migrations/2026_02_03_000017_create_jenis_terapi_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jenis_terapi', function (Blueprint $table) {
            $table->id('id_jenis_terapi');
            $table->string('nama', 100);
            $table->boolean('deleted')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jenis_terapi');
    }
};
