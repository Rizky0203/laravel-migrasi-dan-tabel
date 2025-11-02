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
    Schema::create('personal_trainers', function (Blueprint $table) {
        $table->id();
        $table->string('nama_trainer');
        $table->string('spesialisasi'); // e.g., 'Yoga', 'Weightlifting'
        $table->text('deskripsi')->nullable();
        $table->integer('harga_per_sesi');
        $table->string('nomor_telepon')->nullable();
        $table->string('foto_profil')->nullable(); // Path ke foto
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personal_trainers');
    }
};
