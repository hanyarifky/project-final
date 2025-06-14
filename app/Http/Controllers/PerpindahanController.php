<?php

namespace App\Http\Controllers;

use App\Models\Penduduk;
use App\Models\Perpindahan;
use Illuminate\Http\Request;

class PerpindahanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Delete User!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view('perpindahan.index', ['perpindahans' => Perpindahan::with(['penduduk'])->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('perpindahan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request->all();

        $validateDataPenduduk = $request->validate(
            [
                'nama' => "required|string",
                'nik' => "nullable|string|size:16|unique:penduduks,nik",
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

        $validateDataPerpindahan = $request->validate(
            [
                'tanggal_pindah' => 'required|date',
                'alamat_asal' => 'required|string',
                'alamat_tujuan' => 'required|string',
                'alasan_pindah' => 'required|string',
                'status_perpindahan' => 'required|in:sementara,permanen'
            ]
        );

        // return $validateDataPerpindahan;

        try {
            $penduduk = Penduduk::create($validateDataPenduduk);
            $penduduk->perpindahan()->create($validateDataPerpindahan);

            alert()->success('Tambah Sukses', 'Berhasil Menambahkan Data');
            return redirect('/perpindahan');
        } catch (\Exception $e) {
            alert()->error('Gagal', 'Gagal Menambahkan Data');
            return $e;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Perpindahan $perpindahan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Perpindahan $perpindahan)
    {
        return view('perpindahan.edit', ['perpindahan' => $perpindahan]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Perpindahan $perpindahan)
    {
        //
        $rulesDataPenduduk =
            [
                'nama' => "required|string",
                'jenis_kelamin' => "required|in:laki-laki,perempuan",
                'tempat_lahir' => "required|string",
                'tanggal_lahir' => "required|date",
                'agama' => 'required|string',
                'status_perkawinan' => 'required|in:kawin,belum kawin',
                'pekerjaan' => 'required|string',
                'status_di_keluarga' => 'nullable|in:ayah,ibu,anak',
                'kartu_keluarga_id' => 'nullable|exists:kartu_keluargas,id'
            ];

        $rulesDataPerpindahan =
            [
                'tanggal_pindah' => 'required|date',
                'alamat_asal' => 'required|string',
                'alamat_tujuan' => 'required|string',
                'alasan_pindah' => 'required|string',
                'status_perpindahan' => 'required|in:sementara,permanen'
            ];

        if ($request->nik != $perpindahan->penduduk->nik) {
            $rulesDataPenduduk['nik'] = "nullable|string|size:16|unique:penduduks,nik";
        }

        $validateDataPenduduk = $request->validate($rulesDataPenduduk);
        $validateDataPerpindahan = $request->validate($rulesDataPerpindahan);

        try {
            if (Penduduk::where('id', $perpindahan->penduduk->id)->update($validateDataPenduduk)) {
                Perpindahan::where('id', $perpindahan->id)->update($validateDataPerpindahan);
                alert()->success('Update Sukses', 'Berhasil Mengupdate Data');
                return redirect('/perpindahan');
            }
        } catch (\Exception $e) {
            alert()->error('Gagal', 'Gagal Mengupdate Data');
            return $e;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Perpindahan $perpindahan)
    {
        //
    }
}
