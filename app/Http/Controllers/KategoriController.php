<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.kategori.kategori')->with([
            'kategoris' => Kategori::all(),
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
        $request->validate([
            'kategori' => 'required',   
        ]);

        $kategoris = new Kategori;
        $kategoris->kategori = $request->kategori;

        $kategoris->save();

        return redirect()->route('kategori.index')->with('success', 'Film berhasil ditambahkan.');
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
        return view('kategori.edit')->with([
            'kategoris' => Kategori::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'gambar' => 'nullable',
        ]);

        $kategoris = Kategori::find($id);
        $kategoris->kategori = $request->kategori;

        $kategoris->save();

        return redirect()->route('kategori.index')->with('success', 'Banner berhasil ditambahkan.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kategoris = Kategori::find($id);
        $kategoris->delete();

        return back()->with('success', 'Data Berhasil Di hapus');
    }
}
