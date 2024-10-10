<?php

namespace App\Http\Controllers;

use App\Models\ADD;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ADDController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adds = ADD::oldest()->filter(request(['search']))->paginate(10);
        return view('keamanan admin.ADD.index', [
            "active" => "Amankan Diri Digital",
            "title" => "Kelola Konten Amankan Diri Digital",
            "adds" => $adds
        ], compact('adds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('keamanan admin.ADD.create', [
            "active" => "Amankan Diri Digital",
            "title" => "Tambah Konten Amankan Diri Digital Baru"
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
            'category' => 'required|string|max:50',
            'konten' => 'required',
        ]);

        $userId = Auth::id();

        // Membuat ADD baru dengan user_id yang sudah ditentukan
        $add = new ADD();
        $add->title = $request->title;
        $add->category = $request->category;
        $add->konten = $request->konten;
        $add->user_id = $userId; // Set user_id dengan id user yang sedang masuk
        $add->save();


        return redirect('/amankan-diri-digital-dashboard')->with('success', 'Data Baru telah Ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ADD  $aDD
     * @return \Illuminate\Http\Response
     */
    public function show(ADD $aDD)
    {
        return view('keamanan admin.ADD.show', [
            "active" => "Amankan Diri Digital",
            "title" => "Detail Amankan Diri Digital Baru"
        ], compact('aDD'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ADD  $aDD
     * @return \Illuminate\Http\Response
     */
    public function edit(ADD $aDD)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ADD  $aDD
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ADD $aDD)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ADD  $aDD
     * @return \Illuminate\Http\Response
     */
    public function destroy(ADD $aDD)
    {
        Log::info('Menghapus ADD dengan ID: ' . $aDD->id);
        $aDD->delete();
        return redirect('/amankan-diri-digital-dashboard')->with('success', 'Data Berhasil Dihapus');
    }
}
