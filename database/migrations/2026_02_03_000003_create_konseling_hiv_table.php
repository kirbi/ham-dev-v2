<?php
// database/migrations/2026_02_03_000003_create_konseling_hiv_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('konseling_hivs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pasien_id')->constrained('pasiens')->onDelete('cascade');
            $table->date('tanggal_konseling');
            $table->string('jenis_konseling', 50); // pra, pasca, lanjutan
            $table->text('catatan')->nullable();
            $table->foreignId('konselor_id')->nullable()->constrained('konselors');
            $table->timestamps();
            $table->softDeletes();
            $table->index('pasien_id');
            $table->index('tanggal_konseling');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('konseling_hivs');
    }
};
