<?php

namespace App\Http\Controllers;

use App\Models\Podcast;
use Illuminate\Http\Request;

class PodcastController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.podcast.podcast')->with([
            'podcast' => Podcast::all(),
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
            'judul' => 'required',
            'channel' => 'required',
            'host' => 'required',
            'thumbnail' => 'required',
            'deskripsi' => 'required',
            'video' => 'required',
            'status' => 'required',
        ]);

        $thumbnail = $request->file('thumbnail');
        $imgFile = time() . '.' . $thumbnail->getClientOriginalExtension();
        $thumbnail->move(public_path('imgdb'), $imgFile);
        

        $podcast = new Podcast;
        $podcast->judul = $request->judul;
        $podcast->channel = $request->channel;
        $podcast->host = $request->host;
        $podcast->thumbnail = $imgFile;
        $podcast->deskripsi = $request->deskripsi;
        $podcast->video = $request->video;
        $podcast->status = $request->status;

        $podcast->save();

        return redirect()->route('broadcast.index')->with('success', 'Film berhasil ditambahkan.');
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
        return view('admin.podcast.edit')->with([
            'podcpodcast' => Podcast::find($id),
            'imgfilm' => Podcast::find($id)->thumbnail,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'judul' => 'required',
            'channel' => 'required',
            'host' => 'required',
            'thumbnail' => 'nullable',
            'deskripsi' => 'required',
            'video' => 'required',
            'status' => 'required',
        ]);

        if($request->thumbnail){
            $thumbnail = $request->file('thumbnail');
            $imgFile = time() . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->move(public_path('imgdb'), $imgFile);
            } else {
                $podcast=Podcast::find( $id );
                $thumbnail = $podcast->thumbnail;
            }

        $podcast = Podcast::find( $id );
        $podcast->judul = $request->judul;
        $podcast->channel = $request->channel;
        $podcast->host = $request->host;
        $podcast->thumbnail = $thumbnail;
        $podcast->deskripsi = $request->deskripsi;
        $podcast->video = $request->video;
        $podcast->status = $request->status;

        $podcast->save();

        return redirect()->route('broadcast.index')->with('success', 'Film berhasil ditambahkan.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $podcast = Podcast::find($id);
        $podcast->delete();

        return back()->with('success', 'Data Berhasil Di hapus');
    }
}
