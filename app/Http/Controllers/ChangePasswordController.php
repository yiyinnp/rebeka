<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ChangePasswordController extends Controller
{
    public function index()
    {
        return view('login.ganti password', [
            "active" => "Ganti Password",
            "title" => "Ganti Password"
        ]);
    }
    
    public function update(Request $request)
    {
        // Validasi input form penggantian password di sini
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:5',
        ]);

        // Jika pengecekan validasi salah
        if ($validator->fails()) {
            return redirect('/ganti-password')
                        ->withErrors($validator)
                        ->withInput()
                        ->with('error', 'Gagal! Silakan Ulangi');
        }

        //penampung data inputan
        $email = $request->input('email');
        $newPassword = $request->input('password');

        // validasi email 
        $user = User::where('email', $email)->first();
        if (!$user) {
            return redirect('/ganti-password')->with('error', 'Gagal! Silakan Ulangi');
        }

        //upload password baru
        $user->password = Hash::make($newPassword);
        $user->save();

        return redirect('/')->with('success', 'Kata Sandi berhasil diubah.');
    }
}
