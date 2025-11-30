<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resep; 

class ResepController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        $resep = Resep::findOrFail($id);
        return view('reseps.show', compact('resep'));
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }

    // ================= HOME =================
    public function home(Request $request)
    {
        $search = $request->query('q');

        $query = Resep::query();

        if ($search) {
            // kalau user lagi search → tampilkan semua hasil yang cocok
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                  ->orWhere('kategori', 'like', "%{$search}%");
            });
        } else {
            // kalau tidak search → batasi 6 resep saja
            $query->limit(6);
        }

        $reseps = $query->orderBy('id', 'asc')->get();

        return view('home', [
            'reseps' => $reseps,
            'search' => $search,
        ]);
    }

    public function createUser()
    {
        return view('upload-resep');
    }

    public function storeUser(Request $request)
    {
        $request->validate([
            'nama'       => 'required|string|max:255',
            'bahan'      => 'required|string',
            'cara_masak' => 'required|string',
            'gambar'     => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $gambarPath = $request->file('gambar')->store('images', 'public');

        Resep::create([
            'nama'       => $request->nama,
            'bahan'      => $request->bahan,
            'cara_masak' => $request->cara_masak,
            'gambar'     => $gambarPath,
            'user_id'    => auth()->id(),
        ]);

        return redirect()->route('home')->with('success', 'Resep berhasil diupload!');
    }
}
