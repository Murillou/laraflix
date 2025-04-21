<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['name', 'image_url', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function favorites()
    {
        return $this->belongsToMany(Movie::class, 'favorites');
    }

    public function watchlists()
    {
        return $this->hasMany(WatchList::class);
    }
}
