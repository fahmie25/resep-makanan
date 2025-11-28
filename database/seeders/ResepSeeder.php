<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Resep;

class ResepSeeder extends Seeder
{
    public function run(): void
    {
        Resep::create([
            'nama'       => 'Rawon Surabaya',
            'kategori'   => 'Jawa Timur',
            'gambar'     => 'images/rawon.jpg',  // nanti kamu taruh file gambarnya di storage
            'bahan'      => "500 g daging sapi\n2 batang serai\n3 lembar daun jeruk\nBumbu halus secukupnya",
            'cara_masak' => "Rebus daging sampai empuk.\nTumis bumbu halus hingga harum.\nMasukkan daging dan bumbu ke kuah.\nMasak sampai bumbu meresap.",
        ]);

        Resep::create([
            'nama'       => 'Pempek Palembang',
            'kategori'   => 'Sumatera Selatan',
            'gambar'     => 'images/pempek.jpg',
            'bahan'      => "500 g ikan tenggiri giling\n400 g tepung sagu\n2 butir telur\nBumbu cuko secukupnya",
            'cara_masak' => "Campur ikan dan bumbu.\nTambahkan sagu dan bentuk pempek.\nRebus hingga mengapung.\nGoreng sebelum disajikan dengan cuko.",
        ]);

        // Tambah resep lain di sini kalau mau...
    }
}