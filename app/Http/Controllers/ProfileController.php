<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileValidateRequest;
use App\Models\Profile;
use App\Repositories\ProfileRepository;
use App\Services\TmdbService;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function __construct(ProfileRepository $repository)
    {
        $this->middleware('auth');
        $this->repository = $repository;
    }
    public function select()
    {
        $profiles = Profile::where('user_id', Auth::id())->get();

        return view('profiles.select', compact('profiles'));
    }

    public function create()
    {
        return view('profiles.create');
    }

    public function store(ProfileValidateRequest $request)
    {
        $data = $request->validated();
        $this->handleImageUpload($request, $data);

        $data['user_id'] = Auth::id();

        $this->repository->create($data);

        return redirect()->route('profiles.select')->with('success', 'Perfil criado com sucesso!');
    }

    public function show(Profile $profile, TmdbService $tmdbService)
    {
        $movies = $tmdbService->getMovies();

        return view('profiles.movies', compact('profile', 'movies'));
    }
    public function edit(Profile $profile)
    {
        $this->authorizeProfile($profile);

        return view('profiles.edit', compact('profile'));
    }
    public function update(ProfileValidateRequest $request, Profile $profile)
    {
        $this->authorizeProfile($profile);
        $data = $request->validated();
        $this->handleImageUpload($request, $data);

        $this->repository->update($data, $profile);

        return redirect()->route('profiles.select')->with('success', 'Perfil atualizado com sucesso!');
    }

    public function destroy(Profile $profile)
    {
        $this->authorizeProfile($profile);
        $this->repository->delete($profile);

        return redirect()->route('profiles.select')->with('success', 'Perfil deletado com sucesso!');
    }

    private function handleImageUpload(ProfileValidateRequest $request, array &$data): void
    {
        if ($request->hasFile('image_url')) {
            $data['image_url'] = $request->file('image_url')->store('images', 'public');
        }
    }

    private function authorizeProfile(Profile $profile)
    {
        if ($profile->user_id !== Auth::id()) {
            abort(403);
        }
    }
}
