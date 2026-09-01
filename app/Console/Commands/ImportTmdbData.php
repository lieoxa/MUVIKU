<?php

namespace App\Console\Commands;

use App\Models\Episode;
use App\Models\Film;
use App\Models\Kategori;
use App\Models\Season;
use App\Services\TmdbService;
use Illuminate\Console\Command;

class ImportTmdbData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'muviku:import-tmdb {--count=10 : Jumlah film/series yang diimport}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import film dan series populer dari API TMDB ke database MUVIKU tanpa menggunakan storage laptop';

    protected TmdbService $tmdbService;

    public function __construct(TmdbService $tmdbService)
    {
        parent::__construct();
        $this->tmdbService = $tmdbService;
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $count = (int) $this->option('count');
        $this->info("Mengambil {$count} Film & Series populer dari TMDB API...");

        $targetMoviesCount = (int) ceil($count / 2);
        $targetTvCount = (int) floor($count / 2);

        // Fetch popular movies across multiple pages
        $movies = [];
        $page = 1;
        while (count($movies) < $targetMoviesCount && $page <= 10) {
            $res = $this->tmdbService->getPopularMovies($page);
            $results = $res['results'] ?? [];
            if (empty($results)) break;
            foreach ($results as $item) {
                $movies[] = $item;
                if (count($movies) >= $targetMoviesCount) break;
            }
            $page++;
        }

        // Fetch popular TV across multiple pages
        $tvs = [];
        $page = 1;
        while (count($tvs) < $targetTvCount && $page <= 10) {
            $res = $this->tmdbService->getPopularTv($page);
            $results = $res['results'] ?? [];
            if (empty($results)) break;
            foreach ($results as $item) {
                $tvs[] = $item;
                if (count($tvs) >= $targetTvCount) break;
            }
            $page++;
        }

        $imported = 0;

        // Import Movies
        foreach ($movies as $movieData) {
            $details = $this->tmdbService->getMovieDetails($movieData['id']);
            if (empty($details)) continue;

            $title = $details['title'] ?? 'Film TMDB';
            $overview = $details['overview'] ?? 'Deskripsi tidak tersedia.';
            $releaseDate = $details['release_date'] ?? date('Y-m-d');
            $year = (int) substr($releaseDate, 0, 4);
            $thumbnailUrl = $this->tmdbService->getImageUrl($details['poster_path'] ?? null);
            $trailerUrl = $this->tmdbService->getTrailerUrl($details['videos'] ?? []);
            $runtime = isset($details['runtime']) ? $details['runtime'] . ' Menit' : '120 Menit';

            $kategoriId = null;
            if (!empty($details['genres'])) {
                $genreName = $details['genres'][0]['name'];
                $kategori = Kategori::firstOrCreate(
                    ['kategori' => $genreName],
                    ['kategori' => $genreName]
                );
                $kategoriId = $kategori->id;
            }

            Film::updateOrCreate(
                ['judul' => $title],
                [
                    'thumbnail' => $thumbnailUrl,
                    'deskripsi' => $overview,
                    'tahun' => $year ?: date('Y'),
                    'usia' => $details['age_rating'] ?? '13+',
                    'perusahaan' => !empty($details['production_companies']) ? $details['production_companies'][0]['name'] : 'TMDB Studio',
                    'sutradara' => $details['director_name'] ?? 'Unknown Director',
                    'video' => $trailerUrl,
                    'durasi' => $runtime,
                    'kategori_id' => $kategoriId,
                    'tipe' => 'Film',
                    'is_publish' => 1,
                ]
            );

            $this->line(" [FILM]  Imported: {$title}");
            $imported++;
        }

        // Import TV Series
        foreach ($tvs as $tvData) {
            $details = $this->tmdbService->getTvDetails($tvData['id']);
            if (empty($details)) continue;

            $title = $details['name'] ?? 'Serial TMDB';
            $overview = $details['overview'] ?? 'Deskripsi tidak tersedia.';
            $firstAirDate = $details['first_air_date'] ?? date('Y-m-d');
            $year = (int) substr($firstAirDate, 0, 4);
            $thumbnailUrl = $this->tmdbService->getImageUrl($details['poster_path'] ?? null);
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

            $film = Film::updateOrCreate(
                ['judul' => $title],
                [
                    'thumbnail' => $thumbnailUrl,
                    'deskripsi' => $overview,
                    'tahun' => $year ?: date('Y'),
                    'usia' => $details['age_rating'] ?? '13+',
                    'perusahaan' => !empty($details['networks']) ? $details['networks'][0]['name'] : 'TMDB Network',
                    'sutradara' => $details['creator_name'] ?? 'Unknown Creator',
                    'video' => $trailerUrl,
                    'durasi' => ($details['number_of_seasons'] ?? 1) . ' Season',
                    'kategori_id' => $kategoriId,
                    'tipe' => 'Serial',
                    'is_publish' => 1,
                ]
            );

            // Add season & episodes if new
            if ($film->seasons()->count() === 0) {
                $season = Season::create([
                    'film_id' => $film->id,
                    'season' => 'Season 1',
                    'is_publish' => 1,
                ]);

                Episode::create([
                    'season_id' => $season->id,
                    'episode' => 1,
                    'serial' => $title,
                    'judul' => 'Episode 1: Pilot',
                    'thumb_eps' => $thumbnailUrl,
                    'vid_eps' => $trailerUrl,
                    'desk_eps' => "Episode perdana dari {$title}.",
                    'is_publish' => 1,
                ]);
            }

            $this->line(" [SERIAL] Imported: {$title}");
            $imported++;
        }

        $this->info(" Berhasil meng-import {$imported} film & serial TV dari TMDB API ke database MUVIKU!");
        return Command::SUCCESS;
    }
}
