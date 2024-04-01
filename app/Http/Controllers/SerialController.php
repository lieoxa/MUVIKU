<?php

namespace App\Http\Controllers;

use App\Models\Serial;
use Illuminate\Http\Request;

class SerialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.serial.serial')->with([
            'serials' => Serial::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $serials = Serial::all();
        return view('admin.serial.create', ['serials' => $serials]);
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
            'season' => 'required',
            'perusahaan' => 'required',
            'sutradara' => 'required',
            'deskripsi' => 'required|max:999',
            'kategori' => 'required',
            'thumbnail' => 'required',
            'video' => 'required',
            'status' => 'required',
        ]);

        $thumbnail = $request->file('thumbnail');
        $imgFile = time() . '.' . $thumbnail->getClientOriginalExtension();
        $thumbnail->move(public_path('imgdb'), $imgFile);
        

        $serials = new Serial;
        $serials->thumbnail = $imgFile;
        $serials->video = $request->video;
        $serials->judul = $request->judul;
        $serials->tahun = $request->tahun;
        $serials->usia = $request->usia;
        $serials->season = $request->season;
        $serials->perusahaan = $request->perusahaan;
        $serials->sutradara = $request->sutradara;
        $serials->deskripsi = $request->deskripsi;
        $serials->kategori = $request->kategori;
        $serials->status = $request->status;

        $serials->save();

        return redirect()->route('serial.index')->with('success', 'Film berhasil ditambahkan.');
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
        
    }
}
