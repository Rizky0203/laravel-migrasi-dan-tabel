<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo; // <-- TAMBAHKAN INI

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'personal_trainer_id',
        'waktu_mulai',
        'waktu_selesai',
        'status',
        'total_harga',
    ];

    // Relasi: Satu booking milik satu User
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Relasi: Satu booking milik satu PersonalTrainer
    public function personalTrainer(): BelongsTo
    {
        return $this->belongsTo(PersonalTrainer::class);
    }
}