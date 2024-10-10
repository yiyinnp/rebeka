<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Leaderboard;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = auth()->user();
        return view('menu utama.info pengguna', [
            "active" => "Profil Pengguna",
            "title" => "Profil Pengguna",
        ], compact('user'));
    }

    public function update(Request $request)
    {
        // Validasi input form pengeditan profil di sini
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . auth()->id(),
            'password' => 'nullable|string|min:5|confirmed',
            'kelas' => 'nullable|string'
        ]);
        // Simpan pembaruan profil ke database
        $user = auth()->user(); // Misalnya, jika menggunakan auth
        $userData = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'kelas' => $request->input('kelas')
        ];

        if ($request->filled('password')) {
            $userData['password'] = Hash::make($request->input('password'));
        }

        User::where('id', $user->id)->update($userData);

        return redirect('/info-pengguna')->with('success', 'Profil Anda telah diperbarui.');
    }
}
