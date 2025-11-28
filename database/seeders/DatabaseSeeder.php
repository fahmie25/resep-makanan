<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Resep;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Resep::insert([
            [
                'nama' => 'Rendang Padang',
                'kategori' => 'Padang',
                'gambar' => 'images/rendang.jpg',
                'bahan' => "1 kg daging sapi\n2 liter santan\nDaun salam\nSerai\nBawang merah\nBawang putih\nCabai\nJahe\nKunyit\nKemiri",
                'cara_masak' => "Potong daging\nBuat bumbu halus\nMasak santan\nMasukkan bumbu & daging\nMasak 3 jam hingga kering"
            ],
            [
                'nama' => 'Gudeg Jogja',
                'kategori' => 'Jogja',
                'gambar' => 'images/gudeg.jpg',
                'bahan' => "Nangka muda\nSantan\nGula merah\nDaun salam\nSerai",
                'cara_masak' => "Rebus nangka\nMasukkan santan\nTambahkan bumbu\nMasak hingga meresap"
            ],
            [
                'nama' => 'Sate Madura',
                'kategori' => 'Madura',
                'gambar' => 'images/sate madura.jpg',
                'bahan' => "Daging ayam\nBumbu kacang\nKecap\nLontong",
                'cara_masak' => "Potong daging\nTusuk sate\nBakar\nLumuri bumbu kacang"
            ],
            [
                'nama' => 'Kerak Telor',
                'kategori' => 'Jakarta',
                'gambar' => 'images/kerak telor.jpg',
                'bahan' => "Telur bebek\nBawang goreng\nKelapa sangrai\nBumbu halus",
                'cara_masak' => "Campur semua bahan\nMasak tanpa minyak\nSajikan"
            ],
        ]);
        
        $this->call([
            ResepSeeder::class,
        ]);
    }
}
