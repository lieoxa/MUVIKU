<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Kategori;
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
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $films = Film::all();
        $categories = Kategori::all();
        return view('admin.film.create', ['films' => $films, 'categories'=> $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'tahun' => 'required',
            'usia' => 'required',
            'durasi' => 'required',
            'perusahaan' => 'required',
            'sutradara' => 'required',
            'deskripsi' => 'required',
            'kategori_id' => 'required',
            'thumbnail' => 'required',
            'video' => 'required',
            'status' => 'required',
        ]);

        $thumbnail = $request->file('thumbnail');
        $imgFile = time() . '.' . $thumbnail->getClientOriginalExtension();
        $thumbnail->move(public_path('imgdb'), $imgFile);
        

        $film = new Film;
        $film->thumbnail = $imgFile;
        $film->video = $request->video;
        $film->judul = $request->judul;
        $film->tahun = $request->tahun;
        $film->usia = $request->usia;
        $film->durasi = $request->durasi;
        $film->perusahaan = $request->perusahaan;
        $film->sutradara = $request->sutradara;
        $film->deskripsi = $request->deskripsi;
        $film->kategori_id = $request->kategori_id;
        $film->status = $request->status;

        $film->save();

        return redirect()->route('film.index')->with('success', 'Film berhasil ditambahkan.');
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
            'tahun' => 'required',
            'usia' => 'required',
            'durasi' => 'required',
            'perusahaan' => 'required',
            'sutradara' => 'required',
            'deskripsi' => 'required|max:999',
            'kategori_id' => 'required',
            'thumbnail' => 'nullable',
            'video' => 'required',
            'status' => 'required',
        ]);

        if($request->thumbnail){
        $thumbnail = $request->file('thumbnail');
        $imgFile = time() . '.' . $thumbnail->getClientOriginalExtension();
        $thumbnail->move(public_path('imgdb'), $imgFile);
        } else {
            $film=Film::find( $id );
            $thumbnail = $film->thumbnail;
        }

        $film = Film::find( $id );
        $film->judul = $request->judul;
        $film->tahun = $request->tahun;
        $film->usia = $request->usia;
        $film->durasi = $request->durasi;
        $film->perusahaan = $request->perusahaan;
        $film->sutradara = $request->sutradara;
        $film->thumbnail = $thumbnail;
        $film->video = $request->video;
        $film->deskripsi = $request->deskripsi;
        $film->kategori_id = $request->kategori_id;
        $film->status = $request->status;

        $film->save();

        return redirect()->route('film.index')->with('success', 'Film berhasil diedit.');
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
