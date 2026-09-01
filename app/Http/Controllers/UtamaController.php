<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Episode;
use App\Models\Film;
use App\Models\Kategori;
use App\Models\Podcast;
use App\Models\User;
use Illuminate\Http\Request;

class UtamaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('user.movie')->with([
            'banner' => Banner::all(),
        ]);
    }

    public function home() {
        $banner = Banner::where('status','Publish')->get();
        if ($banner->isEmpty()) {
            $banner = Banner::all();
        }
        $podcast = Podcast::all();
        $films = Film::all();
        $kategoris = Kategori::all();
        $users = User::all();
        $episodes = Episode::all();

        // Categorized film collections matching genres strictly
        $filmsAnimasi = Film::whereIn('kategori_id', [4, 13])
            ->orWhere('judul', 'like', '%Toy Story%')
            ->orWhere('judul', 'like', '%Minions%')
            ->orWhere('judul', 'like', '%Moana%')
            ->orWhere('judul', 'like', '%Simpsons%')
            ->orWhere('judul', 'like', '%Family Guy%')
            ->get();

        $filmsAnime = Film::where('kategori_id', 16)
            ->orWhere('perusahaan', 'like', '%Toei%')
            ->orWhere('perusahaan', 'like', '%MAPPA%')
            ->orWhere('judul', 'like', '%ONE PIECE%')
            ->orWhere('judul', 'like', '%Jujutsu%')
            ->orWhere('judul', 'like', '%Demon Slayer%')
            ->orWhere('judul', 'like', '%Suzume%')
            ->orWhere('judul', 'like', '%Tokyo Revengers%')
            ->orWhere('judul', 'like', '%Doraemon%')
            ->orWhere('judul', 'like', '%哆啦A梦%')
            ->get();

        $filmsHero = Film::whereIn('kategori_id', [3, 5])
            ->orWhere('judul', 'like', '%Spider-Man%')
            ->orWhere('judul', 'like', '%Avengers%')
            ->orWhere('judul', 'like', '%Supergirl%')
            ->orWhere('judul', 'like', '%Lanterns%')
            ->orWhere('judul', 'like', '%Rage of Stars%')
            ->get();

        $filmsKorea = Film::where('kategori_id', 15)
            ->orWhere('perusahaan', 'like', '%CJ%')
            ->orWhere('perusahaan', 'like', '%Dragon%')
            ->orWhere('perusahaan', 'like', '%Korea%')
            ->orWhere('judul', 'like', '%Parasite%')
            ->orWhere('judul', 'like', '%Train to Busan%')
            ->orWhere('judul', 'like', '%Squid Game%')
            ->orWhere('judul', 'like', '%Crash Landing%')
            ->orWhere('judul', 'like', '%All of Us Are Dead%')
            ->orWhere('judul', 'like', '%군체%')
            ->get();

        $filmsHorror = Film::where('kategori_id', 10)
            ->orWhere('judul', 'like', '%Pengabdi Setan%')
            ->orWhere('judul', 'like', '%Evil Dead%')
            ->orWhere('judul', 'like', '%The Last House%')
            ->orWhere('judul', 'like', '%Backrooms%')
            ->orWhere('judul', 'like', '%Obsession%')
            ->get();

        $filmsIndonesia = Film::where('kategori_id', 17)
            ->orWhere('perusahaan', 'like', '%Rapi Films%')
            ->orWhere('perusahaan', 'like', '%Screenplay%')
            ->orWhere('sutradara', 'like', '%Indonesian%')
            ->orWhere('judul', 'like', '%Pengabdi Setan%')
            ->orWhere('judul', 'like', '%Laskar Pelangi%')
            ->orWhere('judul', 'like', '%Cek Toko Sebelah%')
            ->orWhere('judul', 'like', '%Pertaruhan%')
            ->orWhere('judul', 'like', '%Cinta Pertama Ayah%')
            ->orWhere('judul', 'like', '%Hukum%')
            ->get();

        $serials = Film::where('tipe', 'Serial')->get();
        $filmsExclusive = Film::whereNotNull('thumbnail')->latest()->get();
        $filmsRandom = Film::where('is_publish', '1')->inRandomOrder()->get();

        $filmsPopuler = Film::where('tipe', 'Film')
            ->where('is_publish', '1')
            ->where(function($q) {
                $q->where('judul', 'like', '%Spider-Man%')
                  ->orWhere('judul', 'like', '%Avengers%')
                  ->orWhere('judul', 'like', '%Parasite%')
                  ->orWhere('judul', 'like', '%Train to Busan%')
                  ->orWhere('judul', 'like', '%Avatar%')
                  ->orWhere('judul', 'like', '%Dark Knight%')
                  ->orWhere('judul', 'like', '%Batman%');
            })->take(5)->get();

        if ($filmsPopuler->count() < 5) {
            $filmsPopuler = Film::where('tipe', 'Film')->where('is_publish', '1')->latest()->take(5)->get();
        }

        return view('user.utama', compact(
            'banner','podcast','films','kategoris','users','episodes',
            'filmsAnimasi','filmsAnime','filmsHero','filmsKorea','filmsHorror','filmsIndonesia','serials','filmsExclusive','filmsRandom','filmsPopuler'
        ));
    }

    /**
     * API endpoint to fetch films dynamically by category/genre
     */
    public function getFilmsByGenre(Request $request, $genreId)
    {
        $query = Film::query();
        if ($genreId !== 'all') {
            $query->where('kategori_id', $genreId);
        }
        $films = $query->latest()->get()->map(function($film) {
            return [
                'id' => $film->id,
                'judul' => $film->judul,
                'thumbnail_url' => $film->thumbnail_url,
                'kategori' => $film->kategorifilm ? $film->kategorifilm->kategori : 'Umum',
                'tahun' => $film->tahun,
                'durasi' => $film->durasi,
                'tipe' => $film->tipe,
            ];
        });

        return response()->json([
            'status' => 'success',
            'data' => $films
        ]);
    }
    /**
     * Show the form for creating a new resource.   
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
