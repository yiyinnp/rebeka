<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::first()->filter(request(['search']))->paginate(10);
        return view('menu utama admin.userlist admin.index', [
            "active" => "Daftar Pengguna",
            "title" => "Daftar Akun Pengguna",
            "users" => $users
        ], compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('menu utama admin.userlist admin.create', [
            "active" => "Daftar Pengguna",
            "title" => "Tambah Akun Pengguna",
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            // 'username' => 'required|min:3|max:255|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|max:255|confirmed',
            'level' => 'required',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);
        return redirect('/daftar-akun-pengguna')->with('success', 'Data Baru telah Ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('menu utama admin.userlist admin.show', [
            "active" => "Daftar Pengguna",
            "title" => "Detail Akun Pengguna",
        ], compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('menu utama admin.userlist admin.edit', [
            "active" => "Daftar Pengguna",
            "title" => "Edit Akun Pengguna",
        ], compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id, // Memastikan email unik kecuali untuk user yang sedang di-update
            'password' => 'nullable|string|min:5|confirmed',
            'level' => 'required|in:Guru,Siswa', // Validasi level
        ]);
    
        // Data yang akan diupdate
        $userData = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'level' => $request->input('level'),
        ];
    
        // Jika password diisi, maka password akan di-hash dan disimpan
        if ($request->filled('password')) {
            $userData['password'] = Hash::make($request->input('password'));
        }
    
        // Simpan perubahan data
        $user->update($userData);
        return redirect('/daftar-akun-pengguna')->with('success', 'Data berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect('/daftar-akun-pengguna')->with('success', 'Data Berhasil Dihapus');
    }
}
