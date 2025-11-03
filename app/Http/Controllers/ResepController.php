<?php

namespace App\Http\Controllers;

use App\Models\Resep;
use Illuminate\Http\Request;

class ResepController extends Controller
{
    public function index()
    {
        $reseps = Resep::all();
        return view('reseps.index', compact('reseps'));
    }

    public function create()
    {
        return view('reseps.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'bahan' => 'required',
            'langkah' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('images', 'public');
            $data['gambar'] = $path;
        }

        Resep::create($data);

        return redirect()->route('reseps.index')->with('success', 'Resep berhasil ditambahkan!');
    }

    public function show(Resep $resep)
    {
        return view('reseps.show', compact('resep'));
    }

    public function edit(Resep $resep)
    {
        return view('reseps.edit', compact('resep'));
    }

    public function update(Request $request, Resep $resep)
    {
        $request->validate([
            'judul' => 'required',
            'bahan' => 'required',
            'langkah' => 'required',
        ]);

        $resep->update($request->all());

        return redirect()->route('reseps.index')->with('success', 'Resep berhasil diperbarui!');
    }

    public function destroy(Resep $resep)
    {
        $resep->delete();
        return redirect()->route('reseps.index')->with('success', 'Resep berhasil dihapus!');
    }
}