<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Film;
use App\Models\Rekomendasi;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request) {
        $banner = Banner::all();
        $query = $request->input('q');

        if (!empty($query)) {
            $searchResults = Film::where('is_publish', '1')
                ->where(function($q) use ($query) {
                    $q->where('judul', 'like', "%{$query}%")
                      ->orWhere('deskripsi', 'like', "%{$query}%")
                      ->orWhere('perusahaan', 'like', "%{$query}%")
                      ->orWhere('sutradara', 'like', "%{$query}%");
                })->get();
        } else {
            $searchResults = collect();
        }

        $filmsAnime = Film::where('kategori_id', 16)
            ->orWhere('perusahaan', 'like', '%Toei%')
            ->orWhere('perusahaan', 'like', '%MAPPA%')
            ->orWhere('judul', 'like', '%ONE PIECE%')
            ->orWhere('judul', 'like', '%Jujutsu%')
            ->orWhere('judul', 'like', '%Demon Slayer%')
            ->orWhere('judul', 'like', '%Suzume%')
            ->orWhere('judul', 'like', '%Tokyo Revengers%')
            ->orWhere('judul', 'like', '%Doraemon%')
            ->get();

        $filmsBanyakDitonton = Film::where('is_publish', '1')->latest()->get();
        $filmsRekomendasi = Film::where('is_publish', '1')->inRandomOrder()->get();

        return view('user.search', compact('banner', 'filmsAnime', 'filmsBanyakDitonton', 'filmsRekomendasi', 'searchResults', 'query'));
    }
}
