<?php

namespace App\Http\Controllers;

use App\Models\Film;
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
            'deskripsi' => 'required',
            'thumbnail' => 'required',
            'video' => 'required',
            'status' => 'required',
        ]);

        $thumbnail = $request->file('thumbnail');
        $imgFile = time() . '.' . $thumbnail->getClientOriginalExtension();
        $thumbnail->move(public_path('imgdb'), $imgFile);
        

        $serial = new Serial;
        $serial->thumbnail = $imgFile;
        $serial->video = $request->video;
        $serial->judul = $request->judul;
        $serial->tahun = $request->tahun;
        $serial->usia = $request->usia;
        $serial->season = $request->season;
        $serial->perusahaan = $request->perusahaan;
        $serial->sutradara = $request->sutradara;
        $serial->deskripsi = $request->deskripsi;
        $serial->status = $request->status;

        $serial->save();

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
        return view('admin.serial.edit')->with([
            'serials' => Serial::find($id),
            'imgfilm' => Serial::find($id)->thumbnail,
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
            'season' => 'required',
            'perusahaan' => 'required',
            'sutradara' => 'required',
            'deskripsi' => 'required|max:999',
            'thumbnail' => 'nullable',
            'video' => 'required',
            'status' => 'required',
        ]);

        if($request->thumbnail){
        $thumbnail = $request->file('thumbnail');
        $imgFile = time() . '.' . $thumbnail->getClientOriginalExtension();
        $thumbnail->move(public_path('imgdb'), $imgFile);
        } else {
            $serial=Serial::find( $id );
            $thumbnail = $serial->thumbnail;
        }

        $serial = Serial::find( $id );
        $serial->judul = $request->judul;
        $serial->tahun = $request->tahun;
        $serial->usia = $request->usia;
        $serial->season = $request->season;
        $serial->perusahaan = $request->perusahaan;
        $serial->sutradara = $request->sutradara;
        $serial->thumbnail = $thumbnail;
        $serial->video = $request->video;
        $serial->deskripsi = $request->deskripsi;
        $serial->status = $request->status;

        $serial->save();

        return redirect()->route('serial.index')->with('success', 'Film berhasil diedit.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $serial = Serial::find($id);
        $serial->delete();

        return back()->with('success', 'Data Berhasil Di hapus');
    }
}
