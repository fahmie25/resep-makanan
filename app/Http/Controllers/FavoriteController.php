<?php

namespace App\Http\Controllers;

use App\Models\Resep;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    // menampilkan daftar resep favorit user
    public function index()
    {
        $user = Auth::user();
        if (! $user) {
            return redirect()->route('login');
        }

        $reseps = $user->favoriteReseps; // relasi di model User

        return view('favorites.index', compact('reseps'));
    }

    // tambah / hapus favorite
    public function toggle(Resep $resep)
    {
        $user = Auth::user();
        if (! $user) {
            return redirect()->route('login');
        }

        // cek apakah sudah ada
        $exists = $user->favoriteReseps()
            ->where('resep_id', $resep->id)
            ->exists();

        if ($exists) {
            // hapus dari favorit
            $user->favoriteReseps()->detach($resep->id);
        } else {
            // tambahkan ke favorit
            $user->favoriteReseps()->attach($resep->id);
        }

        // setelah klik bintang, pindah ke halaman daftar favorit
        return redirect()->route('favorites.index');
    }
}
