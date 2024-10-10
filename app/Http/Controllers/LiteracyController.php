<?php

namespace App\Http\Controllers;

use App\Models\Literacy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class LiteracyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $literacies = Literacy::oldest()->filter(request(['search']))->paginate(10);
        return view('menu utama admin.literasi admin.index', [
            "active" => "Literasi Dashboard",
            "title" => "Kelola Data Menu Literasi",
            "literacies" => $literacies
        ], compact('literacies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('menu utama admin.literasi admin.create', [
            "active" => "Literasi Dashboard",
            "title" => "Tambah Data Menu Literasi",
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
            $literacy = new Literacy();
            $literacy->title = $request->title;
            $literacy->subbab = $request->subbab;
            $literacy->category = $request->category;
            $literacy->konten = $request->konten;
            $literacy->file_path = $path;
            $literacy->user_id = $userId; // Set user_id dengan id user yang sedang masuk
            $literacy->save();
        }

        return redirect('/literasi-dashboard')->with('success', 'Data Baru telah Ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Literacy  $literacy
     * @return \Illuminate\Http\Response
     */
    public function show(Literacy $literacy)
    {
        return view('menu utama admin.literasi admin.show', [
            "active" => "Literasi Dashboard",
            "title" => "Detail Data Menu Literasi"
        ], compact('literacy'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Literacy  $literacy
     * @return \Illuminate\Http\Response
     */
    public function edit(Literacy $literacy)
    {
        return view('menu utama admin.literasi admin.edit', [
            "active" => "Literasi Dashboard",
            "title" => "Edit Data Menu Literasi"
        ], compact('literacy'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Literacy  $literacy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Literacy $literacy)
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
            if ($literacy->file_path) {
                Storage::delete('public/' . $literacy->file_path);
            }
    
            // Simpan file baru dan ambil path-nya
            $filePath = $request->file('file')->store('uploads/files');
    
            // Update field file_path dengan path baru
            $literacy->file_path = $filePath;
        }

        $literacy->update([
            'title' => $request->title,
            'subbab' => $request->subbab,
            'category' => $request->category,
            'konten' => $request->konten,
            'user_id' => $literacy->user_id, // Pertahankan user_id yang sudah ada
        ]);

        return redirect('/literasi-dashboard')->with('success', 'Data Berhasil Diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Literacy  $literacy
     * @return \Illuminate\Http\Response
     */
    public function destroy(Literacy $literacy)
    {
        if ($literacy->file_path) {
            Storage::delete('public/' . $literacy->file_path);
        }

        $literacy->delete();
        return redirect('/literasi-dashboard')->with('success', 'Data Berhasil Dihapus');
    }
}
