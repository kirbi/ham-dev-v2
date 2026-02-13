<?php
// database/migrations/2026_02_03_000009_create_status_fungsional_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('status_fungsional', function (Blueprint $table) {
            $table->id('id_status_fungsional');
            $table->string('nama', 100);
            $table->boolean('deleted')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('status_fungsional');
    }
};
