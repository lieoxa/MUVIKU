<?php

namespace App\Http\Controllers;

use App\Models\Rekomendasi;
use Illuminate\Http\Request;

class RekomendasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.rekomendasi.rekomendasi')->with([
            'rekomendasis' => Rekomendasi::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rekomendasis = Rekomendasi::all();
        return view('admin.rekomendasi.rekomendasi', ['reomendasis' => $rekomendasis]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'gambar' => 'required',
            'judul' => 'required',
            'deskripsi' => 'required',
            'tgl' => 'required',
            'jam' => 'required',
            'status' => 'required',
        ]);

        $gambarBarang = $request->file('gambar');
        $namaFile = time() . '.' . $gambarBarang->getClientOriginalExtension();
        $gambarBarang->move(public_path('imgdb'), $namaFile);

        $rekomendasi = new Rekomendasi;
        $rekomendasi->gambar = $namaFile;
        $rekomendasi->judul = $request->judul;
        $rekomendasi->deskripsi = $request->deskripsi;
        $rekomendasi->tgl = $request->tgl;
        $rekomendasi->jam = $request->jam;
        $rekomendasi->status = $request->status;

        $rekomendasi->save();

        return redirect()->route('rekomendasi.index')->with('success', 'Rekomendasi berhasil ditambahkan.');
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
        $request->validate([
            'gambar' => 'nullable',
            'judul' => 'required',
            'deskripsi' => 'required',
            'tgl' => 'required',
            'jam' => 'required',
            'status' => 'required',
        ]);

        if($request->thumbnail){
            $namaFile = $request->file('thumbnail');
            $imgFile = time() . '.' . $namaFile->getClientOriginalExtension();
            $namaFile->move(public_path('imgdb'), $imgFile);
        } else {
            $film=Rekomendasi::find( $id );
            $namaFile = $film->gambar;
        }

        $rekomendasi = Rekomendasi::find($id);
        $rekomendasi->gambar = $namaFile;
        $rekomendasi->judul = $request->judul;
        $rekomendasi->deskripsi = $request->deskripsi;
        $rekomendasi->tgl = $request->tgl;
        $rekomendasi->jam = $request->jam;
        $rekomendasi->status = $request->status;

        $rekomendasi->save();

        return redirect()->route('rekomendasi.index')->with('success', 'Rekomendasi berhasil ditambahkan.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $rekomendasis = Rekomendasi::find($id);
        $rekomendasis->delete();

        return back()->with('success', 'Data Berhasil Di hapus');
    }
}
