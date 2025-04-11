<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterValidateRequest;
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

    public function store(RegisterValidateRequest $request, ProfileRepository $repository)
    {
        $data = $request->validated();

        $data['password'] = Hash::make($data['password']);

        $user = User::create($data);

        auth()->login($user);

        return redirect()->route('profiles.select');
    }
}
