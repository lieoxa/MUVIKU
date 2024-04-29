<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use App\Models\Film;
use App\Models\Kategori;
use App\Models\Season;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.film.film')->with([
            'films' => Film::all(),
            'seasons' => Season::all(),
        ]);
    }

    public function episode()
    {
        return view('admin.film.episode')->with([
            'films' => Film::all(),
            'seasons' => Season::all(),
            'episodes' => Episode::all(),
        ]);
    
    }

    public function season()
    {
        return view('admin.film.season')->with([
            'films' => Film::all(),
            'seasons' => Season::all(),
            'episodes' => Episode::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $films = Film::all();
        $categories = Kategori::all();
        return view('admin.film.create', ['films' => $films, 'categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'tipe' => 'required',
            'tahun' => 'required',
            'usia' => 'required',
            'durasi' => 'required',
            'perusahaan' => 'required',
            'sutradara' => 'required',
            'deskripsi' => 'required',
            'kategori_id' => 'nullable',
            'thumbnail' => 'required',
            'video' => 'nullable',
            'is_publish' => 'required',
        ]);

        $thumbnail = $request->file('thumbnail');
        $imgFile = time() . '.' . $thumbnail->getClientOriginalExtension();
        $thumbnail->move(public_path('imgfilm'), $imgFile);


        $film = new Film;
        $film->thumbnail = $imgFile;
        $film->video = $request->video;
        $film->judul = $request->judul;
        $film->tipe = $request->tipe;
        $film->tahun = $request->tahun;
        $film->usia = $request->usia;
        $film->durasi = $request->durasi;
        $film->perusahaan = $request->perusahaan;
        $film->sutradara = $request->sutradara;
        $film->deskripsi = $request->deskripsi;
        $film->kategori_id = $request->kategori_id;
        $film->is_publish = $request->is_publish;

        $film->save();

        return redirect()->route('film.index')->with('success', 'Film berhasil ditambahkan.');
    }

    public function post(Request $request)
    {
        $season = Season::create([
            'season' => $request->input('season'),
            'is_publish' => $request->input('is_publish'),
            'film_id' => $request->input('film_id')[0],
        ]);

        return redirect()->back()->with('status', 'Season berhasil ditambahkan');
    }

    public function postEps(Request $request)
    {
        $episode = Episode::create($request->all());
        $episode->episode()->attach($request->input('season_id'));
        return redirect()->back()->with('status', 'Episode berhasil ditambahkan');
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
        // dd(Film::find($id));
        $categories = Kategori::get();
        return view('admin.film.edit')->with([
            'films' => Film::find($id),
            'imgfilm' => Film::find($id)->thumbnail,
            'categories' => $categories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'judul' => 'required',
            'tipe' => 'nullable',
            'tahun' => 'required',
            'usia' => 'required',
            'durasi' => 'required',
            'perusahaan' => 'required',
            'sutradara' => 'required',
            'deskripsi' => 'required',
            'kategori_id' => 'nullable',
            'thumbnail' => 'nullable',
            'video' => 'nullable',
            'is_publish' => 'required',
            'view' => 'nullable',
        ]);

        if ($request->thumbnail) {
            $thumbnail = $request->file('thumbnail');
            $imgFile = time() . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->move(public_path('imgfilm'), $imgFile);
        } else {
            $film = Film::find($id);
            $thumbnail = $film->thumbnail;
        }

        $film = Film::find($id);
        $film->judul = $request->judul;
        $film->tipe = $request->tipe;
        $film->tahun = $request->tahun;
        $film->usia = $request->usia;
        $film->durasi = $request->durasi;
        $film->perusahaan = $request->perusahaan;
        $film->sutradara = $request->sutradara;
        $film->thumbnail = $thumbnail;
        $film->video = $request->video;
        $film->deskripsi = $request->deskripsi;
        $film->kategori_id = $request->kategori_id;
        $film->is_publish = $request->is_publish;

        $film->save();
        // dd($film);

        return redirect()->route('film.index')->with('success', 'Film berhasil diedit.');
    }

    public function editeps(Request $request, string $id)
    {
        $request->validate([
            'serial' => 'required',
            'season_id' => 'nullable',
            'judul' => 'required',
            'thumb_eps' => 'required',
            'vid_eps' => 'required',
            'is_publish' => 'required',
            'desk_eps' => 'required',
        ]);

        if ($request->thumbnail) {
            $thumbnail = $request->file('thumb_eps');
            $imgFile = time() . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->move(public_path('imgthum'), $imgFile);
        } else {
            $eps = Episode::find($id);
            $thumbnail = $eps->thumbnail;
        }

        $eps = Episode::find($id);
        $eps->serial = $request->serial;
        $eps->season_id= $request->season_id;
        $eps->judul = $request->judul;
        $eps->thumb_eps = $thumbnail;
        $eps->vid_eps = $request->video;
        $eps->desk_eps = $request->desk_eps;
        $eps->is_publish = $request->is_publish;

        $eps->save();

        return redirect()->route('daftareps')->with('success', 'Film berhasil diedit.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $film = Film::find($id);
        $film->delete();

        return back()->with('success', 'Data Berhasil Di hapus');
    }
}
