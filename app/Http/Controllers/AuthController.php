<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.index');
    }

    public function login(Request $request)
    {
        $creds = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($creds)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return redirect()->back()->with('error', 'Authentication failed, try again!');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
