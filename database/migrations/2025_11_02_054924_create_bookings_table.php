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
    Schema::create('bookings', function (Blueprint $table) {
        $table->id();

        // Siapa yang memesan?
        $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

        // Siapa yang dipesan?
        $table->foreignId('personal_trainer_id')->constrained('personal_trainers')->onDelete('cascade');

        $table->dateTime('waktu_mulai');
        $table->dateTime('waktu_selesai');
        $table->string('status')->default('pending'); // pending, confirmed, completed
        $table->integer('total_harga');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
