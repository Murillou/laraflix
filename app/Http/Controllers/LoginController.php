<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function create()
    {
        return view('login.create');
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'email|required',
            'password' => 'required|min:8'
        ]);

        if (Auth::attempt($credentials)){
            $request->session()->regenerate();

            return redirect()->route('profiles.select');
        }

        return back()->withErrors([
            'email' => 'As credenciais estão incorretas.'
        ])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
