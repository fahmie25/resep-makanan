<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resep extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'kategori',
        'gambar',
        'bahan',
        'cara_masak',
    ];

    // Relasi ke favorite
    public function favorites()
    {
        return $this->hasMany(Favorite::class, 'resep_id');
    }

    // Siapa saja user yang mem-favorite resep ini (kalau mau dipakai di tempat lain)
    public function favoritedBy()
    {
        return $this->belongsToMany(User::class, 'favorites', 'resep_id', 'user_id');
    }
}