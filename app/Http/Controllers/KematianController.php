<?php

namespace App\Http\Controllers;

use App\Models\Kematian;
use App\Models\Penduduk;
use Illuminate\Http\Request;

class KematianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('kematian.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(
            'kematian.create',
            [
                'penduduks' => Penduduk::with('kartuKeluarga')->get(),
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Kematian $kematian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kematian $kematian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kematian $kematian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kematian $kematian)
    {
        //
    }
}
