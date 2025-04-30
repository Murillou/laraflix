<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Services\TmdbService;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class MovieController extends Controller
{
    protected $tmdbService;
    public function __construct(TmdbService $tmdbService)
    {
        $this->tmdbService = $tmdbService;
    }

    public function index(Request $request, $profileId)
    {
        $profile = Profile::findOrFail($profileId);

        $page = $request->get('page', 1);

        $response = $this->tmdbService->getMovies($page);

        if (!$response) {
            return view('movies.index', [
                'movies' => collect([]),
                'profile' => $profile,
            ]);
        }

        $movies = collect($response['results']);
        $totalResultsPage = $response['total_results'];

        $moviesPaginated = new LengthAwarePaginator(
            $movies,
            $totalResultsPage,
            10,
            $page,
            ['path' => url()->current(), 'query' => $request->query()]
        );

        return view('movies.index', [
            'movies' => $moviesPaginated,
            'profile' => $profile,
        ]);
    }

    public function show($profileId, $movieId)
    {
        $profile = Profile::findOrFail($profileId);
        $movie = $this->tmdbService->getMovieDetails($movieId);

        return view('movies.show', compact('profile', 'movie'));
    }

    public function addToFavorites(Request $request, $profileId, $movieId)
    {
        $profile = Profile::findOrFail($profileId);

        $exists = $profile->movies->wherePivot('movie_id', $movieId)->wherePivot('status', 'favorite')->exists();

        if (!$exists) {
            $profile->movies()->updateOrInsert(
                ['movie_id' => $movieId],
                ['status' => 'favorite']
            );
        }
        return back()->with('success', 'Filme adicionado aos favoritos!');
    }

    public function favorites($profileId)
    {
        $profile = Profile::findOrFail($profileId);
        $favorites = $profile->favoriteMovies();

        return view('movies.favorites', compact('favorites', 'profile'));
    }
}
