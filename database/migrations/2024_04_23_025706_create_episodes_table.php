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
        Schema::create('episodes', function (Blueprint $table) {
            $table->id();
            $table->string('episode');
            $table->foreignId('season_id');
            $table->string('serial');
            $table->string('judul');
            $table->string('thumb_eps')->nullable();
            $table->string('vid_eps')->nullable();
            $table->boolean('is_publish')->default(0);
            $table->longText('desk_eps');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('episodes');
    }
};
