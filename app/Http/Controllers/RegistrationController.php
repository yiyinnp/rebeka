<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    public function index() {
        return view('login.register', [
            'title' => 'Register',
            'active' => 'Register'
        ]);
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            // 'username' => 'required|min:3|max:255|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|max:255|confirmed',
            'kelas' => 'nullable|string'
        ]);

        $validatedData['level'] = $request->input('level', 'siswa');

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);
        return redirect('/')->with('success', 'Registrasi Berhasil! Silakan Masuk');
    }
}