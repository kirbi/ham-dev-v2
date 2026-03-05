<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void {
        Schema::create('hubungans', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 100);
            $table->boolean('deleted')->default(false);
        });
    }
    public function down(): void { Schema::dropIfExists('hubungans'); }
};
