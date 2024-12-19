<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function index()
    {
        return view('/login', ['title' => 'AILA | LOGIN']);
    }

    public function login(Request $request)
    {
        $request->validate([
            'nipp' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('nipp', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Redirect based on role
            if ($user->role === 'Admin') {
                return redirect()->route('adminindex');
            } elseif ($user->role === 'Spv') {
                return redirect()->route('spvindex');
            } elseif ($user->role === 'Officer') {
                return redirect()->route('officerindex');
            }
        }

        return back()->withErrors('NIPP Atau Password Salah!!');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
