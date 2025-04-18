<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
}
