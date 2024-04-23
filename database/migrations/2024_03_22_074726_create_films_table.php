<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('films', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('thumbnail')->nullable();
            $table->integer('tahun');
            $table->string('usia');
            $table->string('perusahaan');
            $table->string('sutradara');
            $table->longText('deskripsi');
            $table->foreignId('kategori_id')->nullable();
            $table->string('is_publish')    ;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('films');
    }
};
