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
        Schema::create('mahasantri', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nim');
            $table->string('nama_mhs');
            $table->unsignedBigInteger('mentor_id');
            $table->string('gambar')->nullable();
            $table->enum("status", ["l", "a"]);
            $table->foreign('mentor_id')->references('id')->on('user');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasantri');
    }
};
