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
        $podcast = Podcast::all();
        $films = Film::all();
        $kategoris = Kategori::all();
        $users = User::all();
        $episodes = Episode::all();
        
        return view('user.utama', compact('banner','podcast','films','kategoris','users','episodes'));
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
