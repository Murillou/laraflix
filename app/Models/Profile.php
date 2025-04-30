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

    public function movies()
    {
        return $this->belongsToMany(Movie::class, 'profile_movie')
            ->withPivot('status', 'scheduled_at')
            ->withTimestamps();
    }

    public function favoriteMovies()
    {
        return $this->movies()->wherePivot('status', 'favorite');
    }
}
