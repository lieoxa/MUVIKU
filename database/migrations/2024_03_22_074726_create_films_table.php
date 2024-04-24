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
            $table->longText('deskripsi');

            $table->integer('tahun');
            $table->string('usia');
            $table->string('perusahaan');
            $table->string('sutradara');

            $table->string('video')->nullable();
            $table->string('durasi')->nullable();
            $table->bigInteger('view')->nullable();

            $table->foreignId('kategori_id')->nullable();
            $table->enum('tipe', ['Film','Serial'])->default('Film');
            $table->boolean('is_publish')->default(1);
            $table->timestamps();
        });

        // $film_tipe_film = Film::where('tipe', 'film')->get();
        // $film = Film::where('tipe', 'serial')->get();
        // $film = Film::whereIn('tipe', ['film','serial'])->get();
        // $film = Film::get();

        // foreach ($film_tipe_film as $value) {
            
        //     $value->video;
        //     $value->durasi;

        // }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('films');
    }
};
