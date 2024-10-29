<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        try {
            $authAttempt = Auth::attempt(['email' => $request->email, 'password' => $request->password]);
            if ($authAttempt) {
                return redirect('/')->with('success', 'Login berhasil');
            }
            return redirect('/login')->withErrors('Email atau password salah');
        } catch (\Throwable $th) {
            return redirect('/login')->withErrors('Terjadi kesalahan pada server');
        }
    }

    public function logout(Request $request) {
        try {
            Auth::logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            return redirect('/login')->with('success', 'Logout berhasil');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors('Terjadi kesalahan pada server');
        }
    }
}
