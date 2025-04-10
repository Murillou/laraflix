<?php

namespace App\Http\Controllers;

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

    public function store(Request $request, ProfileRepository $repository)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:15'],
            'image_url' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
        ]);

        if ($request->hasFile('image_url')) {
            $data['image_url'] = $request->file('image_url')->store('images', 'public');
        }

        $data['user_id'] = Auth::id();

        Profile::create($data);

        return redirect()->route('profiles.select')->with('success', 'Perfil criado com sucesso!');
    }
}
