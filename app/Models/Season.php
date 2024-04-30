<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Season extends Model
{
    use HasFactory;
    protected $guarded = ["id"];

    /**
     * Get all of the episodes for the Season
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function episodes(): HasMany
    {
        return $this->hasMany(Episode::class, 'season_id', 'id');
    }

    public function film(){
        return $this->belongsTo(Film::class,'film_id','id');
    }
}
