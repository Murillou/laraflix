<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileValidateRequest;
use App\Models\Profile;
use App\Repositories\ProfileRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
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

    public function store(ProfileValidateRequest $request, ProfileRepository $repository)
    {
        $user = Auth::user();

        if ($user->profiles()->count() >= 5) {
            return redirect()->route('profiles.select')->with('error', 'Você só pode ter no máximo 5 perfis.');
        }

        $data = $request->validated();

        if ($request->hasFile('image_url')) {
            $data['image_url'] = $request->file('image_url')->store('images', 'public');
        }

        $data['user_id'] = Auth::id();

        Profile::create($data);

        return redirect()->route('profiles.select')->with('success', 'Perfil criado com sucesso!');
    }

    public function edit(Profile $profile)
    {
        if ($profile->user_id !== Auth::id()) {
            abort(403);
        }

        return view('profiles.edit', compact('profile'));
    }
    public function update(ProfileValidateRequest $request, Profile $profile)
    {
        if ($profile->user_id !== Auth::id()) {
            abort(403);
        }

        $data = $request->validated();

        if ($request->hasFile('image_url')) {
            $data['image_url'] = $request->file('image_url')->store('images', 'public');
        }

        $profile->update($data);

        return redirect()->route('profiles.select')->with('success', 'Perfil atualizado com sucesso!');
    }

    public function destroy(Profile $profile)
    {
        if ($profile->user_id !== Auth::id()) {
            abort(403);
        }

        $profile->delete();

        return redirect()->route('profiles.select')->with('success', 'Perfil deletado com sucesso!');
    }
}
