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

    // Setiap resep punya banyak baris di tabel favorites
    public function favorites()
    {
        return $this->hasMany(Favorite::class, 'resep_id');
        // ini yang dipakai oleh withCount('favorites')
    }

    // Siapa saja user yang mem-favorite resep ini
    public function favoritedBy()
    {
        return $this->belongsToMany(User::class, 'favorites', 'resep_id', 'user_id');
    }
}
