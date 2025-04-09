<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function create()
    {
        return view('login.create');
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)){
            $request->session()->regenerate();

            return redirect()->route('profiles.select');
        }

        return back()->withErrors([
            'email' => 'As credenciais estão incorretas.'
        ])->withInput();
    }
}
