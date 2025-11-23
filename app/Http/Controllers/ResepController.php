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
}
