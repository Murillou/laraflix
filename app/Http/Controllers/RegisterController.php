<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repositories\ProfileRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store(Request $request, ProfileRepository $repository)
    {
        $user = User::create($request->except('_token'));

        auth()->login($user);

        if (auth()->check()) {
            return redirect()->route('profiles.select');
        } else {
            return redirect()->back();
        }
    }
}
