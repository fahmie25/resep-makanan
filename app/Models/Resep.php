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
    return $this->belongsToMany(Resep::class, 'favorites', 'user_id', 'resep_id');
    }


    public function favoritedBy()
    {
    return $this->belongsToMany(User::class, 'favorites', 'resep_id', 'user_id');
    }

}