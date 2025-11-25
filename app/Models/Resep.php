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
        return $this->hasMany(Favorite::class);
    }

    public function favoritedByUsers()
    {
        return $this->belongsToMany(\App\Models\User::class, 'favorites');
    }
}