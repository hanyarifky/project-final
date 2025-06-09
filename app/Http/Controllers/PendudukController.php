<?php

namespace App\Http\Controllers;

use App\Models\KartuKeluarga;
use App\Models\Penduduk;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class PendudukController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index()
    {
        $title = 'Delete User!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view('penduduk.index', [
            'penduduks' => Penduduk::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data_kk = KartuKeluarga::all();
        return view(
            'penduduk.create',
            [
                'data_kk' => $data_kk
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate(
            [
                'nama' => "required|string",
                'nik' => "required|string|size:16",
                'jenis_kelamin' => "required|in:laki-laki,perempuan",
                'tempat_lahir' => "required|string",
                'tanggal_lahir' => "required|date",
                'alamat' => 'required|string',
                'agama' => 'required|string',
                'status_perkawinan' => 'required|in:kawin,belum kawin',
                'pekerjaan' => 'required|string',
            ]
        );
        // dd($request->all());

        try {
            Penduduk::create($validate);

            alert()->success('Tambah Sukses', 'Berhasil Menambahkan Data');
            return redirect('/penduduk');
        } catch (\Exception $e) {
            alert()->error('Gagal', 'Gagal Menambahkan Data');
            return $e;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Penduduk $penduduk)
    {
        $penduduk->load("kartuKeluarga");

        return view(
            'penduduk.show',
            [
                'penduduk' => $penduduk,
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penduduk $penduduk)
    {
        $data_kk = KartuKeluarga::all();
        return view(
            'penduduk.edit',
            [
                'penduduk' => $penduduk,
                'data_kk' => $data_kk
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Penduduk $penduduk)
    {
        //

        // dd($request->all());

        $rulesData =
            [
                'nama' => "required|string",
                'jenis_kelamin' => "required|in:laki-laki,perempuan",
                'tempat_lahir' => "required|string",
                'tanggal_lahir' => "required|date",
                'alamat' => 'required|string',
                'agama' => 'required|string',
                'status_perkawinan' => 'required|in:kawin,belum kawin',
                'pekerjaan' => 'required|string',
                'kartu_keluarga_id' => 'nullable|exists:kartu_keluargas,id'
            ];

        if ($request->nik != $penduduk->nik) {
            $rulesData['nik'] = "required|string|size:16";
        }

        $validateData = $request->validate($rulesData);

        try {
            Penduduk::where('id', $penduduk->id)->update($validateData);

            alert()->success('Update Sukses', 'Berhasil Mengupdate Data');
            return redirect('/penduduk');
        } catch (\Exception $e) {
            alert()->error('Gagal', 'Gagal Mengupdate Data');
            return $e;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penduduk $penduduk)
    {
        alert()->success('Title', 'Lorem Lorem Lorem');
        Penduduk::destroy($penduduk->id);


        return redirect('/penduduk');
    }
}
