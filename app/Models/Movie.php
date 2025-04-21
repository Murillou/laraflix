<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;
    protected $fillable = ['tmdb_id', 'name', 'overview', 'poster_path', 'release_date', 'vote_average'];

    public function watchlists()
    {
        return $this->belongsToMany(Watchlist::class);
    }

    public function favorites()
    {
        return $this->belongsToMany(Profile::class, 'favorites');
    }
}
