<?php
// database/migrations/2026_02_03_000003_create_konseling_hiv_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('konseling_hiv', function (Blueprint $table) {
            $table->id('id_konseling_hiv');
            $table->foreignId('id_pasien')->constrained('pasien', 'id_pasien')->onDelete('cascade');
            $table->date('tanggal_konseling');
            $table->string('jenis_konseling', 50); // pra, pasca, lanjutan
            $table->text('catatan')->nullable();
            $table->foreignId('id_konselor')->nullable()->constrained('konselor', 'id_konselor');
            $table->timestamps();
            $table->softDeletes();
            $table->index('id_pasien');
            $table->index('tanggal_konseling');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('konseling_hiv');
    }
};
