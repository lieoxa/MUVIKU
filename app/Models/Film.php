<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Film extends Model
{
    use HasFactory;

    protected $table = "films";

    protected $guarded = ["id"];
    public function kategorifilm(){
        return $this->belongsTo(Kategori::class,'kategori_id', 'id');
    }

    /**
     * Get all of the seasons for the Film
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function seasons(): HasMany
    {
        return $this->hasMany(Season::class, 'film_id', 'id');
    }

    /**
     * Get all of the episodes for the Film
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function episodes(): HasManyThrough
    {
        return $this->hasManyThrough(Episode::class, Season::class);
    }

    /**
     * Get full URL for thumbnail (supports external URLs and local assets)
     */
    public function getThumbnailUrlAttribute(): string
    {
        if (empty($this->thumbnail)) {
            return asset('img/default-thumbnail.jpg');
        }
        if (str_starts_with($this->thumbnail, 'http://') || str_starts_with($this->thumbnail, 'https://')) {
            return $this->thumbnail;
        }
        return asset('imgthumb/' . $this->thumbnail);
    }

    /**
     * Get YouTube embed URL or direct video URL
     */
    public function getVideoEmbedUrlAttribute(): ?string
    {
        if (empty($this->video)) {
            return null;
        }
        if (str_contains($this->video, 'youtube.com/watch?v=')) {
            parse_str(parse_url($this->video, PHP_URL_QUERY), $params);
            if (isset($params['v'])) {
                return 'https://www.youtube.com/embed/' . $params['v'];
            }
        }
        if (str_contains($this->video, 'youtu.be/')) {
            $path = parse_url($this->video, PHP_URL_PATH);
            return 'https://www.youtube.com/embed/' . ltrim($path, '/');
        }
        return $this->video;
    }
}

