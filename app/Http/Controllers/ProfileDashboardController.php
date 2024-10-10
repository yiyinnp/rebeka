<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileDashboardController extends Controller
{
    public function edit()
    {
        $user = auth()->user();
        return view('menu utama admin.info pengguna', [
            "active" => "Profil",
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
        ]);
        // Simpan pembaruan profil ke database
        $user = auth()->user(); // Misalnya, jika menggunakan auth
        $userData = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ];

        if ($request->filled('password')) {
            $userData['password'] = Hash::make($request->input('password'));
        }

        User::where('id', $user->id)->update($userData);

        return redirect('/info-pengguna-dashboard')->with('success', 'Profil Anda telah diperbarui.');
    }
}
