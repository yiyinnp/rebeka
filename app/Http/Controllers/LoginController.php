<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function indexLogin()
    {
        return view('login.login', [
            "active" => "Login",
            "title" => "Login"
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if (auth()->user()->level == "siswa") {
                return redirect('/literasi');
            } else {
                Auth::logout();
                return redirect('/')->with('loginError', 'Login Gagal! Silakan Ulangi');
            }
        }
        return back()->with('loginError', 'Login Gagal! Silakan Ulangi');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function indexAdmin()
    {
        return view('login.loginadmin', [
            "active" => "Login",
            "title" => "Login"
        ]);
    }

    public function authenticateAdmin(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if (auth()->user()->level=="guru") {
                return redirect('/literasi-dashboard');
            } else if (auth()->user()->level=="admin") {
                return redirect('/literasi-dashboard');
            } else {
                Auth::logout();
                return redirect('/master')->with('loginError', 'Login Gagal! Silakan Ulangi');
            }
        }
        return back()->with('loginError', 'Login Gagal! Silakan Ulangi');
    }

    public function logoutAdmin(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/master');
    }
}
