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
        $search = $request->input('q');   // nama field dari input search

        $query = Resep::query();

        $reseps = collect();

         if ($search) {
            $reseps = Resep::where('nama', 'like', '%' . $search . '%')
                ->orWhere('kategori', 'like', '%' . $search . '%')
                ->get();
            }  

        return view('home', [
            'reseps' => $reseps,
            'search' => $search,
        ]);
    }

}
