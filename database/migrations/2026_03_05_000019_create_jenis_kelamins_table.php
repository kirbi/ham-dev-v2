<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void {
        Schema::create('jenis_kelamins', function (Blueprint $table) {
            $table->id();
            $table->string('inisial', 5);
            $table->string('deskripsi', 100)->nullable();
            $table->boolean('deleted')->default(false);
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('jenis_kelamins'); }
};
