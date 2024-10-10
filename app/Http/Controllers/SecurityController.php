<?php

namespace App\Http\Controllers;

use App\Models\Security;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SecurityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $securities = Security::oldest()->filter(request(['search']))->paginate(10);
        return view('menu utama admin.keamanan admin.index', [
            "active" => "Keamanan Dashboard",
            "title" => "Kelola Data Menu Keamanan",
            "securities" => $securities
        ], compact('securities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('menu utama admin.keamanan admin.create', [
            "active" => "Keamanan Dashboard",
            "title" => "Tambah Data Menu Keamanan",
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
        $request->validate([
            'title' => 'required|max:255',
            'subbab' => 'required|string|max:50',
            'category' => 'required|string|max:50',
            'konten' => 'required',
            'file' => 'required|mimes:pdf|max:10240',
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName(); // Menambahkan timestamp pada nama file
            $path = $file->storeAs('uploads', $filename, 'public'); // Menyimpan file di folder storage/app/public/uploads

            $userId = Auth::id();

            // Membuat ADD baru dengan user_id yang sudah ditentukan
            $security = new Security();
            $security->title = $request->title;
            $security->subbab = $request->subbab;
            $security->category = $request->category;
            $security->konten = $request->konten;
            $security->file_path = $path;
            $security->user_id = $userId; // Set user_id dengan id user yang sedang masuk
            $security->save();
        }

        return redirect('/keamanan-dashboard')->with('success', 'Data Baru telah Ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Security  $security
     * @return \Illuminate\Http\Response
     */
    public function show(Security $security) 
    {
        return view('menu utama admin.keamanan admin.show', [
            "active" => "Keamanan Dashboard",
            "title" => "Detail Data Menu Keamanan"
        ], compact('security'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Security  $security
     * @return \Illuminate\Http\Response
     */
    public function edit(Security $security)
    {
        return view('menu utama admin.keamanan admin.edit', [
            "active" => "Keamanan Dashboard",
            "title" => "Edit Data Menu Keamanan"
        ], compact('security'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Security  $security
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Security $security)
    {
        $request->validate([
            'title' => 'required|max:255',
            'subbab' => 'required|string|max:50',
            'category' => 'required|string|max:50',
            'konten' => 'required',
            'file' => 'nullable|file|mimes:pdf|max:10240',
        ]);

        if ($request->hasFile('file')) {
            // Hapus file lama jika ada
            if ($security->file_path) {
                Storage::delete('public/' . $security->file_path);
            }
    
            // Simpan file baru dan ambil path-nya
            $filePath = $request->file('file')->store('uploads/files');
    
            // Update field file_path dengan path baru
            $security->file_path = $filePath;
        }

        $security->update([
            'title' => $request->title,
            'subbab' => $request->subbab,
            'category' => $request->category,
            'konten' => $request->konten,
            'user_id' => $security->user_id, // Pertahankan user_id yang sudah ada
        ]);

        return redirect('/keamanan-dashboard')->with('success', 'Data Berhasil Diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Security  $security
     * @return \Illuminate\Http\Response
     */
    public function destroy(Security $security)
    {
        if ($security->file_path) {
            Storage::delete('public/' . $security->file_path);
        }

        $security->delete();
        return redirect('/keamanan-dashboard')->with('success', 'Data Berhasil Dihapus');
    }
}
