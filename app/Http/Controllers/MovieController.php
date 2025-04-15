<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Services\TmdbService;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    protected $tmdbService;
    public function __construct(TmdbService $tmdbService)
    {
        $this->tmdbService = $tmdbService;
    }

    public function index($profileId)
    {
        $profile = Profile::findOrFail($profileId);

        $movies = $this->tmdbService->getMovies();

        return view('movies.index', compact('profile', 'movies'));
    }
}
