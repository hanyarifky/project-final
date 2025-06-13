<?php

namespace App\Http\Controllers;

use App\Models\Penduduk;
use App\Models\Kelahiran;
use Illuminate\Http\Request;
use App\Models\KartuKeluarga;

class KelahiranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view(
            "kelahiran.index",
            [
                "data_kelahiran" => Kelahiran::all(),
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(
            "kelahiran.create",
            [
                "data_kk" => KartuKeluarga::all()
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $validateDataPenduduk = $request->validate(
            [
                'nama' => "required|string",
                'nik' => "nullable|string|size:16",
                'jenis_kelamin' => "required|in:laki-laki,perempuan",
                'tempat_lahir' => "required|string",
                'tanggal_lahir' => "required|date",
                'agama' => 'required|string',
                'status_perkawinan' => 'required|in:kawin,belum kawin',
                'pekerjaan' => 'required|string',
                'status_di_keluarga' => 'nullable|in:ayah,ibu,anak',
                'kartu_keluarga_id' => 'nullable|exists:kartu_keluargas,id'
            ]
        );

        $validateDataKelahiran = $request->validate(
            [
                'anak_ke' => 'required|string',
                'jenis_kelahiran' => 'required|in:tunggal,kembar 2,kembar 3,lainnya',
                'berat_bayi' => 'required|number',
                'panjang_bayi' => 'required|number'
            ]
        );

        dd($request->all());

        try {
            Penduduk::create($validateDataPenduduk);
            Kelahiran::create($validateDataKelahiran);

            alert()->success('Tambah Sukses', 'Berhasil Menambahkan Data');
            return redirect('/kelahiran');
        } catch (\Exception $e) {
            alert()->error('Gagal', 'Gagal Menambahkan Data');
            return $e;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Kelahiran $kelahiran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kelahiran $kelahiran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kelahiran $kelahiran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kelahiran $kelahiran)
    {
        //
    }
}
