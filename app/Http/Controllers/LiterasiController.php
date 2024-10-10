<?php

namespace App\Http\Controllers;

use App\Models\Literacy;
use Illuminate\Http\Request;

class LiterasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $literacies = Literacy::latest()->filter(request(['search']))->paginate(10);
        return view('menu utama.literasi.index', [
            "active" => "Literasi",
            "title" => "Literasi",
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Literacy  $literacy
     * @return \Illuminate\Http\Response
     */
    public function show(Literacy $literacy)
    {
        return view('menu utama.literasi.show', [
            "active" => "Literasi",
            "title" => "Literasi",
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Literacy  $literacy
     * @return \Illuminate\Http\Response
     */
    public function destroy(Literacy $literacy)
    {
        //
    }
}
