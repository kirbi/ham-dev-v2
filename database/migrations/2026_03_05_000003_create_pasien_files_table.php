<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pasien_files', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('path');
            $table->string('berkas');
            $table->boolean('deleted')->default(false);
            $table->foreignId('pasien_id')->constrained('pasiens')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pasien_files');
    }
};