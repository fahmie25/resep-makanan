<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Resep;

class FavoriteStatsController extends Controller
{
    public function index()
    {
        // Ambil 12 menu paling banyak difavoritkan
        $topMenus = Resep::withCount('favorites')
            ->orderBy('favorites_count', 'desc')
            ->take(12)
            ->get();

        $labels = $topMenus->pluck('nama');
        $data   = $topMenus->pluck('favorites_count');

        $totalFav = $topMenus->sum('favorites_count');
        $mostFav  = $topMenus->first();

        return view('admin.favorite-stats', compact(
            'labels',
            'data',
            'topMenus',
            'totalFav',
            'mostFav'
        ));
    }
}
