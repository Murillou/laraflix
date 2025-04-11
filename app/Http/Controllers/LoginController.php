<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginValidateRequest;
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

    public function store(LoginValidateRequest $request)
    {
        $credentials = $request->only('email', 'password');

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
