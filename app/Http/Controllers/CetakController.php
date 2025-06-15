<?php

namespace App\Http\Controllers;

use App\Models\Penduduk;
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

    public function cetakPenduduk()
    {
        $pdf = Pdf::loadView('laporan.pdf.penduduk-pdf', ["penduduks" => Penduduk::with(['kartuKeluarga'])->get()]);
        $pdf->setOption('isRemoteEnabled', true);
        $pdf->setOption('isHtml5ParserEnabled', true);
        $pdf->setOption('isPhpEnabled', true);
        return $pdf->setPaper('A4', 'landscape')->stream("laporan-penduduk.pdf");
    }
}
