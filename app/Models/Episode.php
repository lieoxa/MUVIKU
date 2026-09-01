<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    use HasFactory;
    protected $guarded = ["id"];

    /**
     * Get full URL for episode thumbnail (supports external URLs and local assets)
     */
    public function getThumbUrlAttribute(): string
    {
        if (empty($this->thumb_eps)) {
            return asset('img/default-thumbnail.jpg');
        }
        if (str_starts_with($this->thumb_eps, 'http://') || str_starts_with($this->thumb_eps, 'https://')) {
            return $this->thumb_eps;
        }
        return asset('imgthumb/' . $this->thumb_eps);
    }

    /**
     * Get YouTube embed URL or video URL for episode
     */
    public function getVidEmbedUrlAttribute(): ?string
    {
        if (empty($this->vid_eps)) {
            return null;
        }
        if (str_contains($this->vid_eps, 'youtube.com/watch?v=')) {
            parse_str(parse_url($this->vid_eps, PHP_URL_QUERY), $params);
            if (isset($params['v'])) {
                return 'https://www.youtube.com/embed/' . $params['v'];
            }
        }
        if (str_contains($this->vid_eps, 'youtu.be/')) {
            $path = parse_url($this->vid_eps, PHP_URL_PATH);
            return 'https://www.youtube.com/embed/' . ltrim($path, '/');
        }
        return $this->vid_eps;
    }
}
