<?php

namespace App\Http\Controllers;

use App\Models\Penduduk;
use Illuminate\Http\Request;
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
        $title = 'Delete Kartu Keluarga!';
        $text = "Anda yakin ingin menghapus data ini?";
        confirmDelete($title, $text);
        return view('kartu_keluarga.index', [
            'kartu_keluargas' => KartuKeluarga::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kartu_keluarga.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $validateData = $request->validate(
            [
                "nomor_kartu_keluarga" => "required|size:16|string",
                "nama_kepala_keluarga" => "required|string",
                "rw" => "required|string|max:3",
                "rt" => "required|string|max:3"
            ]
        );

        try {

            KartuKeluarga::create($validateData);

            alert()->success("Data berhasil ditambahkan!", "Data kartu keluarga berhasil ditambahkan!");
            return redirect('/kartu-keluarga');
        } catch (\Exception $e) {
            alert()->error("Data gagal ditambahkan!", "Data kartu keluarga gagal ditambahkan!");
            return $e;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(KartuKeluarga $kartuKeluarga)
    {
        $title = 'Delete Kartu Keluarga!';
        $text = "Anda yakin ingin menghapus data ini?";
        confirmDelete($title, $text);
        // $data_penduduk_ = Penduduk::where('kartu_keluarga_id', $kartuKeluarga->id)->get();
        $penduduk = Penduduk::with('kartuKeluarga')->get();
        $data_penduduk_sesuai_kk = $penduduk->where('kartu_keluarga_id', $kartuKeluarga->id);
        $data_penduduk_belum_ada_kk = $penduduk->whereNull('kartu_keluarga_id');
        return view(
            'kartu_keluarga.show',
            [
                'kartuKeluarga' => $kartuKeluarga,
                'penduduks' => $data_penduduk_belum_ada_kk,
                'penduduk_kk' => $data_penduduk_sesuai_kk
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KartuKeluarga $kartuKeluarga)
    {
        return view(
            'kartu_keluarga.edit',
            [
                'kartuKeluarga' => $kartuKeluarga
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KartuKeluarga $kartuKeluarga)
    {
        $rulesData = [
            "nama_kepala_keluarga" => "required|string",
            "rw" => "required|string|max:3",
            "rt" => "required|string|max:3"
        ];

        if ($request->nomor_kartu_keluarga != $kartuKeluarga->nomor_kartu_keluarga) {
            $rulesData['nomor_kartu_keluarga'] = "required|size:16|string";
        }

        $validateData = $request->validate($rulesData);

        try {
            KartuKeluarga::where('id', $kartuKeluarga->id)->update($validateData);

            alert()->success('Data berhasil diupdate!', 'Data kartu keluarga berhasil diupdate!');
            return redirect('/kartu-keluarga');
        } catch (\Exception $e) {
            alert()->error('Data gagal diupdate!', 'Data kartu keluarga gagal diupdate!');
            return $e;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KartuKeluarga $kartuKeluarga)
    {
        Penduduk::where('kartu_keluarga_id', $kartuKeluarga->id)
            ->update(['status_di_keluarga' => null]);

        KartuKeluarga::destroy($kartuKeluarga->id);


        alert()->success('Data Berhasul di Hapus', 'Data Keluarga Berhasil di Hapus');
        return redirect('/kartu-keluarga');
    }

    public function tambahPendudukBaru(Request $request)
    {


        if ($this->cekStatusKeluarga($request)) {
            return back()->withInput();
        }

        // dd($request->all());
        $validate = $request->validate(
            [
                'nama' => "required|string",
                'nik' => "required|string|size:16|unique:penduduks,nik",
                'jenis_kelamin' => "required|in:laki-laki,perempuan",
                'tempat_lahir' => "required|string",
                'tanggal_lahir' => "required|date",
                'alamat' => 'required|string',
                'agama' => 'required|string',
                'status_perkawinan' => 'required|in:kawin,belum kawin',
                'pekerjaan' => 'required|string',
                'status_di_keluarga' => 'nullable|in:ayah,ibu,anak',
                'kartu_keluarga_id' => 'nullable|exists:kartu_keluargas,id'
            ]
        );
        // dd($request->all());


        try {
            Penduduk::create($validate);

            alert()->success('Tambah Sukses', 'Berhasil Menambahkan Data');
            return back();
        } catch (\Exception $e) {
            alert()->error('Gagal', 'Gagal Menambahkan Data');
            return $e;
        }
    }

    public function tambahPenduduk(Request $request)
    {

        // echo Penduduk::where('id', $request->id)->get();
        // dd($request->all());

        // Cek apakah status di keluarga duplikat pada bagian ayah dan ibu
        if ($this->cekStatusKeluarga($request)) {
            return back()->withInput();
        }

        $rulesData =
            [
                'id' => "required",
                'status_di_keluarga' => 'nullable|in:ayah,ibu,anak',
                'kartu_keluarga_id' => 'nullable|exists:kartu_keluargas,id'
            ];

        $validateData = $request->validate($rulesData);

        try {
            Penduduk::where('id', $request->id)->update($validateData);

            alert()->success('Tambah Sukses', 'Berhasil Menambahkan Data Penduduk');
            return back();
        } catch (\Exception $e) {
            alert()->error('Gagal', 'Gagal Mengupdate Data');
            return $e;
        }
    }

    public function updatePendudukKk(Request $request, Penduduk $penduduk)
    {
        // dd($request->all());
        if ($this->cekStatusKeluarga($request)) {
            return back()->withInput();
        }

        $rulesData =
            [
                'id' => "required",
                'status_di_keluarga' => 'nullable|in:ayah,ibu,anak',
                'kartu_keluarga_id' => 'nullable|exists:kartu_keluargas,id'
            ];

        $validateData = $request->validate($rulesData);

        try {
            Penduduk::where('id', $penduduk->id)->update($validateData);

            alert()->success('Tambah Sukses', 'Berhasil Menambahkan Data Penduduk');
            return back();
        } catch (\Exception $e) {
            alert()->error('Gagal', 'Gagal Mengupdate Data');
            return $e;
        }
    }

    public function hapusPendudukKK(Penduduk $penduduk)
    {

        // dd(Penduduk::where('id', $penduduk->id)->get());
        Penduduk::where('id', $penduduk->id)
            ->update(
                [
                    'status_di_keluarga' => null,
                    'kartu_keluarga_id' => null
                ]
            );



        alert()->success('Data Berhasul di Hapus', 'Data Keluarga Berhasil di Hapus');
        return back();
    }

    public function cekStatusKeluarga($request)
    {
        $cekStatus = false;
        if (in_array($request->status_di_keluarga, ['ayah', 'ibu'])) {
            $cekStatus =  Penduduk::where('kartu_keluarga_id', $request->kartu_keluarga_id)
                ->where('status_di_keluarga', $request->status_di_keluarga)
                ->exists();
        }
        // dd($cekStatus);

        if ($cekStatus) {
            alert()->error('Gagal Menambahkan Data', 'Status di keluarga sudah ada');
            return $cekStatus;
        }
    }
}
