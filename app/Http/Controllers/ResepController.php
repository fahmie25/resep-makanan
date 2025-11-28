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

   public function home(Request $request)
    {
    $search = $request->input('q');

    $reseps = Resep::query()
        ->when($search, fn($q) =>
            $q->where('nama', 'like', "%$search%")
              ->orWhere('kategori', 'like', "%$search%")
        )
        ->get();

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

    // upload gambar ke storage
    $gambarPath = $request->file('gambar')->store('images', 'public');

    // simpan ke database
    Resep::create([
        'nama'       => $request->nama,
        'bahan'      => $request->bahan,
        'cara_masak' => $request->cara_masak,
        'gambar'     => $gambarPath,
        'user_id'    => auth()->id(), // simpan siapa yang upload
    ]);

    return redirect()->route('home')->with('success', 'Resep berhasil diupload!');
    }
}
