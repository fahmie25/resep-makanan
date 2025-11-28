<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Resep;

class ResepSeeder extends Seeder
{
    public function run()
    {
        Resep::insert([
            [
                'nama' => 'Rendang Padang',
                'kategori' => 'Daging',
                'gambar' => 'images/rendang.jpg',
                'bahan' => 'Daging sapi, santan, bawang merah, bawang putih, cabai, jahe, kunyit, daun jeruk.',
                'cara_masak' => 'Masak semua bahan dengan santan selama 3 jam hingga kering.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Gudeg Jogja',
                'kategori' => 'Olahan Nangka',
                'gambar' => 'images/gudeg.jpg',
                'bahan' => 'Nangka muda, santan, daun salam, gula merah, bawang merah, bawang putih.',
                'cara_masak' => 'Rebus nangka dan bumbu kemudian masak 3 jam.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Sate Madura',
                'kategori' => 'Daging Ayam',
                'gambar' => 'images/sate madura.jpg',
                'bahan' => 'Ayam, kecap, bawang putih, bawang merah, kacang tanah.',
                'cara_masak' => 'Bakar sate lalu siram bumbu kacang.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Kerak Telor',
                'kategori' => 'Khas Betawi',
                'gambar' => 'images/kerak telor.jpg',
                'bahan' => 'Telur, beras ketan, bawang goreng, kelapa sangrai.',
                'cara_masak' => 'Telur dicampur beras ketan lalu dimasak hingga kering.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Rawon',
                'kategori' => 'Sup Daging',
                'gambar' => 'images/rawon.jpg',
                'bahan' => 'Daging sapi, kluwek, bawang merah, bawang putih.',
                'cara_masak' => 'Rebus daging lalu masukkan bumbu kluwek.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
