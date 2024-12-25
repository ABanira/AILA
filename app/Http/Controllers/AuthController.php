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

        return back()->with('message', 'NIPP Atau Password Salah!!');
    }

    public function face()
    {
        $nippList = User::pluck('nipp');
        return view('/face', compact('nippList'), ['title' => 'AILA | LOGIN']);
    }

    public function loginFace(Request $request)
    {
        // Ambil NIPP dari body request
        $nipp = $request->input('nipp');

        // Cek apakah user dengan NIPP tersebut ada di database
        $user = User::where('nipp', $nipp)->first();

        if ($user) {
            // Lakukan login secara otomatis menggunakan NIPP
            Auth::login($user);

            // Redirect berdasarkan role user
            if ($user->role == 'Admin') {
                return response()->json(['redirect' => route('adminindex')]);
            } else if ($user->role == 'Spv') {
                return response()->json(['redirect' => route('spvindex')]);
            } else if ($user->role == 'Officer') {
                return response()->json(['redirect' => route('officerindex')]);
            }
        } else {
            // Jika user tidak ditemukan, beri response error
            return response()->json(['error' => 'User not found'], 404);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
