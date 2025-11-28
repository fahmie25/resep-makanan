<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Resep;
use Illuminate\Http\Request;

class ResepAdminController extends Controller
{
    /**
     * Halaman utama dashboard admin (list resep)
     */
    public function index()
    {
    $reseps = Resep::latest()->paginate(5);
    return view('admin.dashboard', compact('reseps'));
    }


    /**
     * Halaman form tambah resep
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Proses simpan resep baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'bahan' => 'required',
            'cara_masak' => 'required',
            'gambar' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Simpan gambar ke storage
        $path = $request->file('gambar')->store('images', 'public');

        // Simpan data ke database
        Resep::create([
            'nama'       => $request->nama,
            'bahan'      => $request->bahan,
            'cara_masak' => $request->cara_masak,
            'gambar'     => $path,
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Resep berhasil ditambahkan!');
    }

    /**
     * Halaman edit resep
     */
    public function edit(Resep $resep)
    {
        return view('admin.edit', compact('resep'));
    }

    /**
     * Proses update resep
     */
    public function update(Request $request, Resep $resep)
    {
        $request->validate([
            'nama' => 'required',
            'bahan' => 'required',
            'cara_masak' => 'required',
            'gambar' => 'image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = [
            'nama'       => $request->nama,
            'bahan'      => $request->bahan,
            'cara_masak' => $request->cara_masak,
        ];

        // Jika gambar baru diunggah
        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('images', 'public');
            $data['gambar'] = $path;
        }

        // Update data
        $resep->update($data);

        return redirect()->route('admin.dashboard')->with('success', 'Resep berhasil diperbarui!');
    }

    /**
     * Proses hapus resep
     */
    public function destroy(Resep $resep)
    {
        $resep->delete();
        return back()->with('success', 'Resep berhasil dihapus!');
    }
}
