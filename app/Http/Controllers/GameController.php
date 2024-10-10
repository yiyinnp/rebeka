<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $games = Game::oldest()->filter(request(['search']))->paginate(10);
        return view('menu utama admin.permainan admin.index', [
            "active" => "Permainan Dashboard",
            "title" => "Kelola Data Menu Permainan",
            "games" => $games
        ], compact('games'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('menu utama admin.permainan admin.create', [
            "active" => "Permainan Dashboard",
            "title" => "Tambah Data Menu Permainan",
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
            'konten' => 'required',
            'file' => 'required|mimes:zip',
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName(); // Menambahkan timestamp pada nama file
            $path = $file->storeAs('uploads', $filename, 'public'); // Menyimpan file di folder storage/app/public/uploads

            $userId = Auth::id();

            // Membuat ADD baru dengan user_id yang sudah ditentukan
            $game = new Game();
            $game->title = $request->title;
            $game->konten = $request->konten;
            $game->file_path = $path;
            $game->user_id = $userId; // Set user_id dengan id user yang sedang masuk
            $game->save();
        }

        return redirect('/permainan-dashboard')->with('success', 'Data Baru telah Ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function show(Game $game)
    {
        $fileName = basename($game->file_path);
        return view('menu utama admin.permainan admin.show', [
            "active" => "Permainan Dashboard",
            "title" => "Detail Data Menu Permainan"
        ], compact('game', 'fileName'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function edit(Game $game)
    {
        return view('menu utama admin.permainan admin.edit', [
            "active" => "Permainan Dashboard",
            "title" => "Edit Data Menu Permainan"
        ], compact('game'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Game $game)
    {
        $request->validate([
            'title' => 'required|max:255',
            'konten' => 'required',
            'file' => 'nullable|file|mimes:pdf|max:10240',
        ]);

        if ($request->hasFile('file')) {
            // Hapus file lama jika ada
            if ($game->file_path) {
                Storage::delete('public/' . $game->file_path);
            }
    
            // Simpan file baru dan ambil path-nya
            $filePath = $request->file('file')->store('uploads/files');
    
            // Update field file_path dengan path baru
            $game->file_path = $filePath;
        }

        $game->update([
            'title' => $request->title,
            'konten' => $request->konten,
            'user_id' => $game->user_id, // Pertahankan user_id yang sudah ada
        ]);

        return redirect('/permainan-dashboard')->with('success', 'Data Berhasil Diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function destroy(Game $game)
    {
        if ($game->file_path) {
            Storage::delete('public/' . $game->file_path);
        }

        $game->delete();
        return redirect('/evaluasi-dashboard')->with('success', 'Data Berhasil Dihapus');
    }

    public function downloadFile($id)
    {
        $game = Game::findOrFail($id); // Pastikan ID yang digunakan benar
        $filePath = storage_path('app/public/' . $game->file_path); // Path file dari storage

        if (!file_exists($filePath)) {
            return redirect()->back()->with('error', 'File tidak ditemukan.');
        }

        return response()->download($filePath, basename($filePath));
    }
}
