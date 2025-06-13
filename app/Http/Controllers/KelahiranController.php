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
        $title = 'Delete User!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
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
                'berat_bayi' => 'required|string',
                'panjang_bayi' => 'required|string'
            ]
        );

        // dd($request->all());

        try {
            if (isset($validateDataPenduduk['kartu_keluarga_id'])) {
                // dd($validateDataPenduduk['kartu_keluarga_id']);

                $penduduk = Penduduk::create(
                    [
                        ...$validateDataPenduduk,
                        "status_di_keluarga" => "anak"
                    ]
                );
                $penduduk->kelahiran()->create($validateDataKelahiran);
                alert()->success('Tambah Sukses', 'Berhasil Menambahkan Data');
                return redirect('/kelahiran');
            }
            $penduduk = Penduduk::create($validateDataPenduduk);
            $penduduk->kelahiran()->create($validateDataKelahiran);

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
        return view(
            "kelahiran.edit",
            [
                'kelahiran' => $kelahiran,
                "data_kk" => KartuKeluarga::all()
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kelahiran $kelahiran)
    {
        // dd([$request->all(), $kelahiran]);

        $rulesDataPenduduk =
            [

                'nama' => "required|string",
                'jenis_kelamin' => "required|in:laki-laki,perempuan",
                'tempat_lahir' => "required|string",
                'tanggal_lahir' => "required|date",
                'agama' => 'required|string',
                'kartu_keluarga_id' => 'nullable|exists:kartu_keluargas,id'
            ];

        $rulesDataKelahiran =
            [
                'anak_ke' => 'required|string',
                'jenis_kelahiran' => 'required|in:tunggal,kembar 2,kembar 3,lainnya',
                'berat_bayi' => 'required|string',
                'panjang_bayi' => 'required|string'
            ];

        if ($request->kartu_keluarga_id != null) {
            $rulesDataPenduduk['nik'] = "required|string|size:16";
        }
        if ($request->nik != $kelahiran->penduduk->nik) {
            $rulesDataPenduduk['nik'] = "nullable|string|size:16";
        }

        // dd([$request->all(), $kelahiran]);
        $validateDataKelahiran = $request->validate($rulesDataKelahiran);
        $validateDataPenduduk = $request->validate($rulesDataPenduduk);

        try {
            if (!isset($validateDataPenduduk['kartu_keluarga_id'])) {
                $validateDataPenduduk['status_di_keluarga'] = null;
            } else {
                $validateDataPenduduk['status_di_keluarga'] = "anak";
            }
            if (Penduduk::where('id', $kelahiran->penduduk->id)->update($validateDataPenduduk)) {
                Kelahiran::where('id', $kelahiran->id)->update($validateDataKelahiran);
                alert()->success('Update Sukses', 'Berhasil Mengupdate Data');
                return redirect('/kelahiran');
            }
        } catch (\Exception $e) {
            alert()->error('Gagal', 'Gagal Mengupdate Data');
            return $e;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kelahiran $kelahiran)
    {
        alert()->success('Berhasil di Hapus', 'Data Penduduk Berhasil di Hapus');
        Penduduk::destroy($kelahiran->penduduk->id);


        return redirect('/kelahiran');
    }
}
