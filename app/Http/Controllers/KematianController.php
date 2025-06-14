<?php

namespace App\Http\Controllers;

use App\Models\Kematian;
use App\Models\Penduduk;
use Carbon\Carbon;
use Illuminate\Http\Request;

class KematianController extends Controller
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
            'kematian.index',
            [
                "kematians" => Kematian::with('penduduk')->get(),
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(
            'kematian.create',
            [
                'penduduks' => Penduduk::with('kartuKeluarga')->doesntHave("kematian")->get(),
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $penduduk = Penduduk::where('id', $request['penduduk_id'])->first();
        $request['umur'] = intval(Carbon::parse($penduduk->tanggal_lahir)->diffInYears(Carbon::parse($request->tanggal_kematian)));
        // dd($request->all());
        if ($request->umur < 0) {
            alert()->error('Gagal Menambah Data ', 'Tanggal Kematian tidak boleh sebelum Tanggal Lahir');
            return back()->withInput();
        }


        $validateData = $request->validate(
            [
                "penduduk_id" => "required|exists:penduduks,id",
                "tanggal_kematian" => "required|date",
                "umur" => "required|integer",
                "waktu_kematian" => "required|date_format:H:i",
                "sebab_kematian" => "required|in:sakit biasa/tua,wabah penyakit,kecelakaan,kriminalitas,bunuh diri,lainnya",
                "tempat_kematian" => "required|string"
            ]
        );

        // dd($request->all());

        try {

            Kematian::create($validateData);

            alert()->success('Tambah Sukses', 'Berhasil Menambahkan Data');
            return redirect('/kematian');
        } catch (\Exception $e) {
            alert()->error('Gagal', 'Gagal Menambahkan Data');
            return $e;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Kematian $kematian)
    {
        $title = 'Anda Yakin ingin Mengonfirmasi?';
        $text = "Data Penduduk akan terhapus";
        confirmDelete($title, $text);
        $kematian->load("penduduk");

        return view(
            'kematian.show',
            [
                "kematian" => $kematian
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kematian $kematian)
    {
        return view(
            "kematian.edit",
            [
                "kematian" => $kematian,
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kematian $kematian)
    {
        $penduduk = Penduduk::where('id', $request['penduduk_id'])->first();
        $request['umur'] = intval(Carbon::parse($penduduk->tanggal_lahir)->diffInYears(Carbon::parse($request->tanggal_kematian)));

        if ($request->umur <= 0) {
            alert()->error('Gagal Mengupdate Data ', 'Tanggal Kematian tidak boleh sebelum Tanggal Lahir');
            return back()->withInput();
        }

        // dd($request->all());
        $validateData = $request->validate(
            [
                "penduduk_id" => "required|exists:penduduks,id",
                "tanggal_kematian" => "required|date",
                "umur" => "required|integer",
                "waktu_kematian" => "required|date_format:H:i",
                "sebab_kematian" => "required|in:sakit biasa/tua,wabah penyakit,kecelakaan,kriminalitas,bunuh diri,lainnya",
                "tempat_kematian" => "required|string"
            ]
        );
        // dd($request->all());

        try {

            Kematian::where('penduduk_id', $validateData['penduduk_id'])->update($validateData);

            alert()->success('Update Sukses', 'Berhasil Mengupdate Data');
            return redirect('/kematian');
        } catch (\Exception $e) {
            alert()->error('Gagal', 'Gagal Menambahkan Data');
            return $e;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kematian $kematian)
    {
        alert()->success('Berhasil di Hapus', 'Data Kematian Berhasil di Hapus');
        Kematian::destroy($kematian->id);
        Penduduk::where('id', $kematian->penduduk->id)->update(
            [
                'status' => "aktif"
            ]
        );


        return redirect('/kematian');
    }

    public function konfirmasiKematian(Penduduk $penduduk)
    {

        Penduduk::where('id', $penduduk->id)->update(
            [
                'status' => "tidak aktif"
            ]
        );
        alert()->success('Berhasil di Konfirmasi', 'Data Kematian Berhasil di konfirmasi');


        return redirect('/kematian');
    }
}
