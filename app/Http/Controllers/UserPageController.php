<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;

class UserPageController extends Controller
{
    public function detailFilm($id = null)
    {
        if (!$id) {
            $film = Film::with(['seasons.episodes', 'kategorifilm'])->first();
        } else {
            $film = Film::with(['seasons.episodes', 'kategorifilm'])->find($id) 
                ?: Film::where('judul', 'like', "%{$id}%")->first() 
                ?: Film::first();
        }

        $rekomendasi = Film::where('id', '!=', $film->id)->inRandomOrder()->take(6)->get();

        return view('user.detail_dynamic', compact('film', 'rekomendasi'));
    }

    public function jujutsu()
    {
        $film = Film::where('judul', 'like', '%Jujutsu%')->first() ?: Film::first();
        return $this->detailFilm($film->id);
    }
    public function formlogin()
    {
        return view('admin.login.login');
    }
    public function watchlist()
    {
        return view('user.watchlist');
    }
    public function op()
    {
        $film = Film::where('judul', 'like', '%Piece%')->first() ?: Film::first();
        return $this->detailFilm($film->id);
    }
    public function podcast()
    {
        return view('user.podcast');
    }
    public function toystory()
    {
        $film = Film::where('judul', 'like', '%Toy Story%')->first() ?: Film::first();
        return $this->detailFilm($film->id);
    }
    public function mario()
    {
        $film = Film::where('judul', 'like', '%Mario%')->first() ?: Film::first();
        return $this->detailFilm($film->id);
    }
    public function spy()
    {
        $film = Film::where('judul', 'like', '%Spider%')->first() ?: Film::first();
        return $this->detailFilm($film->id);
    }
    public function iron3()
    {
        $film = Film::where('judul', 'like', '%Avengers%')->first() ?: Film::first();
        return $this->detailFilm($film->id);
    }
    public function century()
    {
        $film = Film::where('judul', 'like', '%Parasite%')->first() ?: Film::first();
        return $this->detailFilm($film->id);
    }
    public function jawa()
    {
        $film = Film::where('judul', 'like', '%Laskar Pelangi%')->first() ?: Film::first();
        return $this->detailFilm($film->id);
    }
    public function pertaruhan()
    {
        $film = Film::where('judul', 'like', '%Pertaruhan%')->first() ?: Film::first();
        return $this->detailFilm($film->id);
    }
    public function detailsrc()
    {
        $film = Film::where('judul', 'like', '%Demon Slayer%')->first() ?: Film::first();
        return $this->detailFilm($film->id);
    }
    public function jumanji()
    {
        $film = Film::where('judul', 'like', '%Pengabdi Setan%')->first() ?: Film::first();
        return $this->detailFilm($film->id);
    }
    public function cars()
    {
        $film = Film::where('judul', 'like', '%Moana%')->first() ?: Film::first();
        return $this->detailFilm($film->id);
    }
    public function conjuring()
    {
        $film = Film::where('judul', 'like', '%Evil Dead%')->first() ?: Film::first();
        return $this->detailFilm($film->id);
    }
    public function justice()
    {
        $film = Film::where('judul', 'like', '%Reacher%')->first() ?: Film::first();
        return $this->detailFilm($film->id);
    }
}
