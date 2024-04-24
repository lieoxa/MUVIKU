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
}

