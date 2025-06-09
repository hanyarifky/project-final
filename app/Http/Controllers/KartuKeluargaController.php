<?php

namespace App\Http\Controllers;

use App\Models\KartuKeluarga;
use App\Http\Requests\StoreKartuKeluargaRequest;
use App\Http\Requests\UpdateKartuKeluargaRequest;

class KartuKeluargaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('kartu_keluarga.index', [
            'kartu_keluargas' => KartuKeluarga::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreKartuKeluargaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(KartuKeluarga $kartuKeluarga)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KartuKeluarga $kartuKeluarga)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKartuKeluargaRequest $request, KartuKeluarga $kartuKeluarga)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KartuKeluarga $kartuKeluarga)
    {
        //
    }
}
