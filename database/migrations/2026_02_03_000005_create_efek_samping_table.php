<?php
// database/migrations/2026_02_03_000005_create_efek_samping_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('efek_samping', function (Blueprint $table) {
            $table->id('id_efek_samping');
            $table->string('nama', 100);
            $table->boolean('deleted')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('efek_samping');
    }
};
