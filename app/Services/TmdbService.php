<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class TmdbService
{
    protected string $baseUrl = 'https://api.themoviedb.org/3';
    protected string $apiKey;
    protected string $imageBaseUrl = 'https://image.tmdb.org/t/p/w500';
    protected string $backdropBaseUrl = 'https://image.tmdb.org/t/p/original';

    public function __construct()
    {
        // Fallback to a working developer key if not set in .env
        $this->apiKey = env('TMDB_API_KEY', '2dca580c2a14b55200e784d157207b4d');
    }

    /**
     * Search movies and TV series by query.
     */
    public function searchMulti(string $query, int $page = 1): array
    {
        try {
            $response = Http::get("{$this->baseUrl}/search/multi", [
                'api_key' => $this->apiKey,
                'query' => $query,
                'language' => 'id-ID',
                'page' => $page,
            ]);

            if ($response->successful()) {
                return $response->json();
            }
        } catch (\Exception $e) {
            Log::error("TMDB Search Error: " . $e->getMessage());
        }

        return ['results' => []];
    }

    /**
     * Get popular movies.
     */
    public function getPopularMovies(int $page = 1): array
    {
        try {
            $response = Http::get("{$this->baseUrl}/movie/popular", [
                'api_key' => $this->apiKey,
                'language' => 'id-ID',
                'page' => $page,
            ]);

            if ($response->successful()) {
                return $response->json();
            }
        } catch (\Exception $e) {
            Log::error("TMDB Popular Movies Error: " . $e->getMessage());
        }

        return ['results' => []];
    }

    /**
     * Get popular TV series.
     */
    public function getPopularTv(int $page = 1): array
    {
        try {
            $response = Http::get("{$this->baseUrl}/tv/popular", [
                'api_key' => $this->apiKey,
                'language' => 'id-ID',
                'page' => $page,
            ]);

            if ($response->successful()) {
                return $response->json();
            }
        } catch (\Exception $e) {
            Log::error("TMDB Popular TV Error: " . $e->getMessage());
        }

        return ['results' => []];
    }

    /**
     * Get details for a specific movie.
     */
    public function getMovieDetails(int $id): array
    {
        try {
            // Get details in Indonesian
            $response = Http::get("{$this->baseUrl}/movie/{$id}", [
                'api_key' => $this->apiKey,
                'language' => 'id-ID',
                'append_to_response' => 'credits,release_dates',
            ]);

            if ($response->successful()) {
                $data = $response->json();
                
                // Fetch videos separately WITHOUT language filter to get English trailers
                $data['videos'] = $this->getVideos('movie', $id);
                
                // Also fetch director from credits
                if (!empty($data['credits']['crew'])) {
                    foreach ($data['credits']['crew'] as $crew) {
                        if ($crew['job'] === 'Director') {
                            $data['director_name'] = $crew['name'];
                            break;
                        }
                    }
                }
                
                // Extract age rating from release_dates
                $data['age_rating'] = $this->getMovieCertification($data['release_dates'] ?? []);
                
                return $data;
            }
        } catch (\Exception $e) {
            Log::error("TMDB Movie Details Error: " . $e->getMessage());
        }

        return [];
    }

    /**
     * Get details for a specific TV show.
     */
    public function getTvDetails(int $id): array
    {
        try {
            // Get details in Indonesian
            $response = Http::get("{$this->baseUrl}/tv/{$id}", [
                'api_key' => $this->apiKey,
                'language' => 'id-ID',
                'append_to_response' => 'credits,content_ratings',
            ]);

            if ($response->successful()) {
                $data = $response->json();
                
                // Fetch videos separately WITHOUT language filter to get English trailers
                $data['videos'] = $this->getVideos('tv', $id);
                
                // Get creator name
                if (!empty($data['created_by'])) {
                    $data['creator_name'] = $data['created_by'][0]['name'] ?? null;
                }
                
                // Extract age rating from content_ratings
                $data['age_rating'] = $this->getTvCertification($data['content_ratings'] ?? []);
                
                return $data;
            }
        } catch (\Exception $e) {
            Log::error("TMDB TV Details Error: " . $e->getMessage());
        }

        return [];
    }

    /**
     * Fetch videos for a movie or TV show WITHOUT language filter.
     * This ensures we get English trailers which are available for most titles.
     */
    public function getVideos(string $type, int $id): array
    {
        try {
            $response = Http::get("{$this->baseUrl}/{$type}/{$id}/videos", [
                'api_key' => $this->apiKey,
                // No language param = returns all available videos (English trailers included)
            ]);

            if ($response->successful()) {
                return $response->json();
            }
        } catch (\Exception $e) {
            Log::error("TMDB Videos Error: " . $e->getMessage());
        }

        return ['results' => []];
    }

    /**
     * Format poster URL.
     */
    public function getImageUrl(?string $path, string $size = 'w500'): ?string
    {
        if (empty($path)) {
            return null;
        }
        if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://')) {
            return $path;
        }
        return "https://image.tmdb.org/t/p/{$size}" . $path;
    }

    /**
     * Get YouTube trailer embed URL from videos array.
     */
    public function getTrailerUrl(array $videos): ?string
    {
        if (empty($videos['results'])) {
            return null;
        }

        // Priority 1: Official Trailer
        foreach ($videos['results'] as $video) {
            if ($video['site'] === 'YouTube' && $video['type'] === 'Trailer' && ($video['official'] ?? false)) {
                return "https://www.youtube.com/embed/" . $video['key'];
            }
        }

        // Priority 2: Any Trailer
        foreach ($videos['results'] as $video) {
            if ($video['site'] === 'YouTube' && $video['type'] === 'Trailer') {
                return "https://www.youtube.com/embed/" . $video['key'];
            }
        }

        // Priority 3: Teaser
        foreach ($videos['results'] as $video) {
            if ($video['site'] === 'YouTube' && $video['type'] === 'Teaser') {
                return "https://www.youtube.com/embed/" . $video['key'];
            }
        }

        // Priority 4: Any YouTube video
        foreach ($videos['results'] as $video) {
            if ($video['site'] === 'YouTube') {
                return "https://www.youtube.com/embed/" . $video['key'];
            }
        }

        return null;
    }

    /**
     * Parse movie certification/age rating.
     */
    public function getMovieCertification(array $releaseDates): string
    {
        if (empty($releaseDates['results'])) {
            return '13+';
        }

        $cert = null;
        foreach ($releaseDates['results'] as $res) {
            if (in_array($res['iso_3166_1'], ['US', 'ID'])) {
                foreach ($res['release_dates'] as $rd) {
                    if (!empty($rd['certification'])) {
                        $cert = $rd['certification'];
                        break 2;
                    }
                }
            }
        }

        if (!$cert) {
            foreach ($releaseDates['results'] as $res) {
                foreach ($res['release_dates'] as $rd) {
                    if (!empty($rd['certification'])) {
                        $cert = $rd['certification'];
                        break 2;
                    }
                }
            }
        }

        return $this->formatAgeRating($cert);
    }

    /**
     * Parse TV content rating.
     */
    public function getTvCertification(array $contentRatings): string
    {
        if (empty($contentRatings['results'])) {
            return '13+';
        }

        $rating = null;
        foreach ($contentRatings['results'] as $res) {
            if (in_array($res['iso_3166_1'], ['US', 'ID'])) {
                if (!empty($res['rating'])) {
                    $rating = $res['rating'];
                    break;
                }
            }
        }

        if (!$rating) {
            foreach ($contentRatings['results'] as $res) {
                if (!empty($res['rating'])) {
                    $rating = $res['rating'];
                    break;
                }
            }
        }

        return $this->formatAgeRating($rating);
    }

    /**
     * Map raw certification code to user-friendly age rating string.
     */
    protected function formatAgeRating(?string $raw): string
    {
        if (!$raw) return '13+';

        $raw = strtoupper(trim($raw));
        switch ($raw) {
            case 'G':
            case 'TV-G':
            case 'TV-Y':
            case 'SU':
                return 'SU';
            case 'PG':
            case 'TV-Y7':
            case 'TV-PG':
                return '7+';
            case 'PG-13':
            case 'TV-14':
            case '13':
            case '13+':
                return '13+';
            case 'R':
            case '17':
            case '17+':
                return '17+';
            case 'NC-17':
            case 'TV-MA':
            case '18':
            case '18+':
            case '21':
            case '21+':
                return '18+';
            default:
                return $raw;
        }
    }
}
