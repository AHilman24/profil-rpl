<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use RealRashid\SweetAlert\Facades\Alert; // optional jika mau pakai Alert::toast

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function autentikasi(Request $request)
    {
        $credentials = $request->validate([
            'email'    => ['required','email'],
            'password' => ['required','min:6'],
        ]);

        // remember me opsional: $request->boolean('remember')
        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            toast('Login berhasil! 👋', 'success');

            return redirect()->intended('/dashboard');
        }

        else {
            toast('Login Error', 'error');
            return redirect()->back()->with('error', 'gagal login');
        }
    }

    public function logout(){
        Auth::logout();
        session()->invalidate();
        toast('Logout Success', 'success');
        return redirect('/')->with('success', 'berhasil');
    }
}
