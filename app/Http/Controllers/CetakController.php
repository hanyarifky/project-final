<?php

namespace App\Http\Controllers;

use App\Models\KartuKeluarga;
use App\Models\Kelahiran;
use App\Models\Kematian;
use App\Models\Penduduk;
use App\Models\Perpindahan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class CetakController extends Controller
{
    //

    public function penduduk()
    {
        return view('laporan.penduduk', ['penduduks' => Penduduk::with(['kartuKeluarga'])->get()]);
    }

    public function kartuKeluarga()
    {
        return view('laporan.kartu-keluarga', ['kartu_keluargas' => KartuKeluarga::all()]);
    }

    public function kelahiran()
    {
        return view('laporan.kelahiran', ['kelahirans' => Kelahiran::with(['penduduk'])->get()]);
    }
    public function kematian()
    {
        return view('laporan.kematian', ['kematians' => Kematian::with(['penduduk'])->get()]);
    }
    public function perpindahan()
    {
        return view('laporan.perpindahan', ['perpindahans' => Perpindahan::with(['penduduk'])->get()]);
    }

    public function cetakPenduduk()
    {
        $pdf = Pdf::loadView('laporan.pdf.penduduk-pdf', ["penduduks" => Penduduk::with(['kartuKeluarga'])->get()]);
        $pdf->setOption('isRemoteEnabled', true);
        $pdf->setOption('isHtml5ParserEnabled', true);
        $pdf->setOption('isPhpEnabled', true);
        return $pdf->setPaper('A4', 'landscape')->stream("laporan-penduduk.pdf");
    }

    public function cetakKartuKeluarga()
    {
        $pdf = Pdf::loadView('laporan.pdf.kartu-keluarga-pdf', ['kartu_keluargas' => KartuKeluarga::all()]);
        $pdf->setOption('isRemoteEnabled', true);
        $pdf->setOption('isHtml5ParserEnabled', true);
        $pdf->setOption('isPhpEnabled', true);
        return $pdf->setPaper('A4', 'landscape')->stream("laporan-kartu-keluarga.pdf");
    }

    public function cetakKelahiran()
    {
        $pdf = Pdf::loadView('laporan.pdf.kelahiran-pdf', ['kelahirans' => Kelahiran::with(['penduduk'])->get()]);
        $pdf->setOption('isRemoteEnabled', true);
        $pdf->setOption('isHtml5ParserEnabled', true);
        $pdf->setOption('isPhpEnabled', true);
        return $pdf->setPaper('A4', 'landscape')->stream("laporan-kelahiran.pdf");
    }

    public function cetakKematian()
    {
        $pdf = Pdf::loadView('laporan.pdf.kematian-pdf', ['kematians' => Kematian::with(['penduduk'])->get()]);
        $pdf->setOption('isRemoteEnabled', true);
        $pdf->setOption('isHtml5ParserEnabled', true);
        $pdf->setOption('isPhpEnabled', true);
        return $pdf->setPaper('A4', 'landscape')->stream("laporan-kematian.pdf");
    }

    public function cetakPerpindahan()
    {
        $pdf = Pdf::loadView('laporan.pdf.perpindahan-pdf', ['perpindahans' => Perpindahan::with(['penduduk'])->get()]);
        $pdf->setOption('isRemoteEnabled', true);
        $pdf->setOption('isHtml5ParserEnabled', true);
        $pdf->setOption('isPhpEnabled', true);
        return $pdf->setPaper('A4', 'landscape')->stream("laporan-perpindahan.pdf");
    }
}
