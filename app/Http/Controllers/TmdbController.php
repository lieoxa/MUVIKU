<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use App\Models\Film;
use App\Models\Kategori;
use App\Models\Season;
use App\Services\TmdbService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TmdbController extends Controller
{
    protected TmdbService $tmdbService;

    public function __construct(TmdbService $tmdbService)
    {
        $this->tmdbService = $tmdbService;
    }

    /**
     * Display TMDB search and popular list in Admin dashboard.
     */
    public function index(Request $request)
    {
        $query = $request->input('query');
        $type = $request->input('type', 'all'); // all, movie, tv

        if ($query) {
            $searchResults = $this->tmdbService->searchMulti($query);
            $results = $searchResults['results'] ?? [];
        } else {
            $popularMovies = $this->tmdbService->getPopularMovies();
            $popularTv = $this->tmdbService->getPopularTv();

            $movies = array_map(function ($item) {
                $item['media_type'] = 'movie';
                return $item;
            }, $popularMovies['results'] ?? []);

            $tvs = array_map(function ($item) {
                $item['media_type'] = 'tv';
                return $item;
            }, $popularTv['results'] ?? []);

            $results = array_merge($movies, $tvs);
        }

        return view('admin.tmdb.index', [
            'results' => $results,
            'query' => $query,
            'service' => $this->tmdbService,
        ]);
    }

    /**
     * Import a movie or TV series from TMDB into MUVIKU database.
     */
    public function import(Request $request)
    {
        $tmdbId = $request->input('tmdb_id');
        $mediaType = $request->input('media_type', 'movie');

        if (!$tmdbId) {
            return back()->with('error', 'TMDB ID tidak valid.');
        }

        if ($mediaType === 'movie') {
            $details = $this->tmdbService->getMovieDetails($tmdbId);
            if (empty($details)) {
                return back()->with('error', 'Gagal mengambil data film dari TMDB.');
            }

            $title = $details['title'] ?? $details['original_title'] ?? 'Film Tanpa Judul';
            $overview = $details['overview'] ?? 'Tidak ada deskripsi.';
            $releaseDate = $details['release_date'] ?? date('Y-m-d');
            $year = (int) substr($releaseDate, 0, 4);
            $posterPath = $details['poster_path'] ?? null;
            $thumbnailUrl = $this->tmdbService->getImageUrl($posterPath);
            $trailerUrl = $this->tmdbService->getTrailerUrl($details['videos'] ?? []);
            $runtime = isset($details['runtime']) ? $details['runtime'] . ' Menit' : '120 Menit';

            // Find or create Kategori
            $kategoriId = null;
            if (!empty($details['genres'])) {
                $genreName = $details['genres'][0]['name'];
                $kategori = Kategori::firstOrCreate(
                    ['kategori' => $genreName],
                    ['kategori' => $genreName]
                );
                $kategoriId = $kategori->id;
            }

            $film = Film::create([
                'judul' => $title,
                'thumbnail' => $thumbnailUrl,
                'deskripsi' => $overview,
                'tahun' => $year ?: date('Y'),
                'usia' => '13+',
                'perusahaan' => !empty($details['production_companies']) ? $details['production_companies'][0]['name'] : 'TMDB Studio',
                'sutradara' => 'TMDB Director',
                'video' => $trailerUrl ?: 'https://www.youtube.com/embed/dQw4w9WgXcQ',
                'durasi' => $runtime,
                'kategori_id' => $kategoriId,
                'tipe' => 'Film',
                'is_publish' => 1,
            ]);

            return redirect()->route('film.index')->with('success', "Film '{$title}' berhasil diimport dari TMDB!");
        } else {
            // TV Series
            $details = $this->tmdbService->getTvDetails($tmdbId);
            if (empty($details)) {
                return back()->with('error', 'Gagal mengambil data serial TV dari TMDB.');
            }

            $title = $details['name'] ?? $details['original_name'] ?? 'Serial Tanpa Judul';
            $overview = $details['overview'] ?? 'Tidak ada deskripsi.';
            $firstAirDate = $details['first_air_date'] ?? date('Y-m-d');
            $year = (int) substr($firstAirDate, 0, 4);
            $posterPath = $details['poster_path'] ?? null;
            $thumbnailUrl = $this->tmdbService->getImageUrl($posterPath);
            $trailerUrl = $this->tmdbService->getTrailerUrl($details['videos'] ?? []);

            $kategoriId = null;
            if (!empty($details['genres'])) {
                $genreName = $details['genres'][0]['name'];
                $kategori = Kategori::firstOrCreate(
                    ['kategori' => $genreName],
                    ['kategori' => $genreName]
                );
                $kategoriId = $kategori->id;
            }

            $film = Film::create([
                'judul' => $title,
                'thumbnail' => $thumbnailUrl,
                'deskripsi' => $overview,
                'tahun' => $year ?: date('Y'),
                'usia' => '13+',
                'perusahaan' => !empty($details['networks']) ? $details['networks'][0]['name'] : 'TMDB Network',
                'sutradara' => 'TMDB Creator',
                'video' => $trailerUrl ?: 'https://www.youtube.com/embed/dQw4w9WgXcQ',
                'durasi' => ($details['number_of_seasons'] ?? 1) . ' Season',
                'kategori_id' => $kategoriId,
                'tipe' => 'Serial',
                'is_publish' => 1,
            ]);

            // Create Season 1 & default episode
            $seasonCount = $details['number_of_seasons'] ?? 1;
            for ($s = 1; $s <= min($seasonCount, 3); $s++) {
                $season = Season::create([
                    'film_id' => $film->id,
                    'season' => "Season {$s}",
                    'is_publish' => 1,
                ]);

                // Add 2 sample episodes per season using trailer/poster
                for ($e = 1; $e <= 2; $e++) {
                    Episode::create([
                        'season_id' => $season->id,
                        'episode' => $e,
                        'serial' => $title,
                        'judul' => "Episode {$e}: " . ($e == 1 ? 'Beginning' : 'Climax'),
                        'thumb_eps' => $thumbnailUrl,
                        'vid_eps' => $trailerUrl ?: 'https://www.youtube.com/embed/dQw4w9WgXcQ',
                        'desk_eps' => "Episode {$e} dari {$title}.",
                        'is_publish' => 1,
                    ]);
                }
            }

            return redirect()->route('film.index')->with('success', "Serial '{$title}' dan season/episode berhasil diimport dari TMDB!");
        }
    }
}
