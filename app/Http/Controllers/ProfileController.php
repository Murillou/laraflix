<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function select()
    {
        $profiles = Profile::where('user_id', Auth::id())->get();

        return view('profiles.select', compact('profiles'));
    }
}
