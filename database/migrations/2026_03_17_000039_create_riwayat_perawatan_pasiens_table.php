<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('riwayat_perawatan_pasiens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pasien_id')->constrained('pasiens')->onDelete('cascade');
            $table->date('tanggal_pengobatan');
            $table->date('rencana_kunjungan_selanjutnya')->nullable();
            $table->unsignedSmallInteger('sisa_obat')->nullable();
            $table->decimal('berat_badan', 5, 2)->nullable();
            $table->decimal('tinggi_badan', 5, 2)->nullable();
            $table->string('stadium_who', 10)->nullable();
            $table->boolean('hamil')->nullable();
            $table->string('metode_kb', 100)->nullable();
            $table->foreignId('infeksi_oportunistik_id')->nullable()->constrained('infeksi_oportunistiks');
            $table->text('obat_untuk_io')->nullable();
            $table->foreignId('status_tb_id')->nullable()->constrained('status_tbs');
            $table->boolean('ppk')->nullable();
            $table->foreignId('paduan_art_id')->nullable()->constrained('paduan_art');
            $table->string('dosis', 100)->nullable();
            $table->foreignId('adherence_art_id')->nullable()->constrained('adherence_art');
            $table->foreignId('efek_samping_id')->nullable()->constrained('efek_sampings');
            $table->unsignedInteger('jumlah_cd4')->nullable();
            $table->string('viral_load', 50)->nullable();
            $table->text('hasil_lab')->nullable();
            $table->boolean('diberi_kondom')->nullable();
            $table->foreignId('status_fungsional_id')->nullable()->constrained('status_fungsionals');
            $table->boolean('rujuk_ke_spesialis')->nullable();
            $table->boolean('deleted')->default(false);
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('riwayat_perawatan_pasiens'); }
};
