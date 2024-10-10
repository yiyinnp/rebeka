<?php

namespace App\Http\Controllers;

use App\Models\Evaluation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class EvaluationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $evaluations = Evaluation::oldest()->filter(request(['search']))->paginate(10);
        return view('menu utama admin.evaluasi admin.index', [
            "active" => "Evaluasi Dashboard",
            "title" => "Kelola Data Menu Evaluasi",
            "evaluations" => $evaluations
        ], compact('evaluations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('menu utama admin.evaluasi admin.create', [
            "active" => "Evaluasi Dashboard",
            "title" => "Tambah Data Menu Evaluasi",
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
            'file' => 'required|mimes:pdf|max:10240',
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName(); // Menambahkan timestamp pada nama file
            $path = $file->storeAs('uploads', $filename, 'public'); // Menyimpan file di folder storage/app/public/uploads

            $userId = Auth::id();

            // Membuat ADD baru dengan user_id yang sudah ditentukan
            $evaluation = new Evaluation();
            $evaluation->title = $request->title;
            $evaluation->konten = $request->konten;
            $evaluation->file_path = $path;
            $evaluation->user_id = $userId; // Set user_id dengan id user yang sedang masuk
            $evaluation->save();
        }

        return redirect('/evaluasi-dashboard')->with('success', 'Data Baru telah Ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Evaluation  $evaluation
     * @return \Illuminate\Http\Response
     */
    public function show(Evaluation $evaluation)
    {
        return view('menu utama admin.evaluasi admin.show', [
            "active" => "Evaluasi Dashboard",
            "title" => "Detail Data Menu Evaluasi",
        ], compact('evaluation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Evaluation  $evaluation
     * @return \Illuminate\Http\Response
     */
    public function edit(Evaluation $evaluation)
    {
        return view('menu utama admin.evaluasi admin.edit', [
            "active" => "Evaluasi Dashboard",
            "title" => "Edit Data Menu Evaluasi",
        ], compact('evaluation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Evaluation  $evaluation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Evaluation $evaluation)
    {
        $request->validate([
            'title' => 'required|max:255',
            'konten' => 'required',
            'file' => 'nullable|file|mimes:pdf|max:10240',
        ]);

        if ($request->hasFile('file')) {
            // Hapus file lama jika ada
            if ($evaluation->file_path) {
                Storage::delete('public/' . $evaluation->file_path);
            }
    
            // Simpan file baru dan ambil path-nya
            $filePath = $request->file('file')->store('uploads/files');
    
            // Update field file_path dengan path baru
            $evaluation->file_path = $filePath;
        }

        $evaluation->update([
            'title' => $request->title,
            'konten' => $request->konten,
            'user_id' => $evaluation->user_id, // Pertahankan user_id yang sudah ada
        ]);

        return redirect('/evaluasi-dashboard')->with('success', 'Data Berhasil Diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Evaluation  $evaluation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Evaluation $evaluation)
    {
        if ($evaluation->file_path) {
            Storage::delete('public/' . $evaluation->file_path);
        }

        $evaluation->delete();
        return redirect('/evaluasi-dashboard')->with('success', 'Data Berhasil Dihapus');
    }
}
