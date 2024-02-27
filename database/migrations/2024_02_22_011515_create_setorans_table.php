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
        Schema::create('setoran', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("mahasantri_id");
            $table->dateTime("tanggal")->default(now());
            $table->decimal("juz", 30);
            $table->decimal("halaman", 8, 2); // Adjust precision and scale as needed
            $table->int("nilai");
            $table->foreign("mahasantri_id")->references("id")->on("mahasantri");
            $table->string("keterangan")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('setoran');
    }
};
