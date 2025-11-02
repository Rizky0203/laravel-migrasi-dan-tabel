<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany; // <-- TAMBAHKAN INI

class PersonalTrainer extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_trainer',
        'spesialisasi',
        'deskripsi',
        'harga_per_sesi',
        'nomor_telepon',
        'foto_profil',
    ];

    // Relasi: Satu Trainer bisa punya banyak Booking
    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }
}