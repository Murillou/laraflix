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
}
