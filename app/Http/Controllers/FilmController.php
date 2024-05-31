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

    public function detail()
    {
        return view('admin.film.detail')->with([
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
        $thumbnail->move(public_path('imgthumb'), $imgFile);


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
        $request->validate([
            'season_id' => 'required',
            'episode' => 'required',
            'serial' => 'required',
            'judul' => 'required',
            'thumb_eps' => 'required',
            'desk_eps' => 'required',
            'is_publish' => 'required',
        ]);

        // dd($request);

        $getArrays = [];
        foreach ($request->judul as $key => $judul) {
            $getArrays[] = [
                'judul'=>$request->judul[$key],
                'serial'=>$request->serial,
                'season_id'=>$request->season_id,
                'episode'=>$request->episode[$key],
                'vid_eps'=>$request->vid_eps[$key],
                'is_publish'=>$request->is_publish[$key],
                'thumb_eps'=>$request->thumb_eps[$key],
                'desk_eps'=>$request->desk_eps[$key],
            ];
        }
        // dd($getArrays);

        foreach ($getArrays as $key => $getArray) {
            // dd($getArray);
            $thumbnail = $getArray['thumb_eps'];
            $imgFile = time() . rand() . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->move(public_path('imgthumb'), $imgFile);

            Episode::create([
                'season_id' => $getArray['season_id'],
                'episode' => $getArray['episode'],
                'serial' => $getArray['serial'],
                'judul' => $getArray['judul'],
                'thumb_eps' => $imgFile,
                'vid_eps' => $getArray['vid_eps'],
                'desk_eps' => $getArray['desk_eps'],
                'is_publish' => $getArray['is_publish'],
            ]);
        }

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

        if ($request->thumb_eps) {
            $thumbnail = $request->file('thumbnail');
            $imgFile = time() . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->move(public_path('imgthumb'), $imgFile);
        } else {
            $imgFile = Film::find($id);
            $thumbnail = $imgFile->thumbnail;
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

    public function editEps(Request $request, string $id)
    {
        dd($request);
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
        $eps->season_id = $request->season_id;
        $eps->judul = $request->judul;
        $eps->thumb_eps = $thumbnail;
        $eps->vid_eps = $request->video;
        $eps->desk_eps = $request->desk_eps;
        $eps->is_publish = $request->is_publish;

        $eps->save();

        return redirect()->route('detailserial')->with('success', 'Film berhasil diedit.');
    }
    
    public function editSeason(Request $request, string $id)
    {
        $request->validate([
            'film_id' => 'required',
            'season' => 'required',
            'is_publish' => 'required',
        ]);

        // dd($request->film_id);
        $season = Season::find($id);
        $season->film_id = $request->film_id;
        $season->season = $request->season;
        $season->is_publish = $request->is_publish;

        $season->save();

        return back()->with('success', 'Film berhasil diedit.');
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

    public function deleteSeason(string $id)
    {
        $season = Season::find($id);
        // dd($episode);
        $season->delete();

        return back()->with('success', 'Data Berhasil Di hapus');
    }


    public function deleteEps(string $id)
    {
        $episode = Episode::find($id);
        // dd($episode);
        $episode->delete();

        return back()->with('success', 'Data Berhasil Di hapus');
    }

    public function getSeason(Request $request)
    {
        $seasons = Season::whereFilmId($request->film_id)->get();
        return response()->json($seasons);
    }

    public function getEpisode(Request $request)
{
    $episodes = Episode::whereSeasonId($request->season_id)->get();
    
    $data_episode = '';
    if(count($episodes) > 0){
        foreach($episodes as $episode){
            // Set warna font berdasarkan is_publish
            if($episode->is_publish == 1){
                $is_publish = '<span style="color: green;">Published</span>';
            } else {
                $is_publish = '<span style="color: red;">Unpublished</span>';
            }
            $data_episode .= 
                '<tr>
                    <td class="text-center py-4">' . $episode->episode . '</td>
                    <td class="text-center py-4">' . $episode->judul . '</td>
                    <td class="text-center py-3"><img src="' .asset('imgthumb/' . $episode->thumb_eps). '" alt="" width="50" height="34" class="rounded"></td>
                    <td class="text-center py-4">' . $is_publish . '</td>
                    <td class="text-center">
                        <a data-bs-toggle="modal" data-bs-target="#edit-episode-{{ $episode->id }}"
                            class="btn btn-outline-warning ms-1"
                            style="padding: 7px 18px">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                    
                        <a href="' .route('deleteEps', $episode->id). '"
                            class="btn btn-outline-danger ms-1"
                            style="padding: 7px 18px">
                            <i class="bi bi-trash"></i>
                        </a>
                    </td>
                </tr>';
        }
    }

    $data = array(
        'table_episode' => $data_episode
    );

    echo json_encode($data);
}

}
