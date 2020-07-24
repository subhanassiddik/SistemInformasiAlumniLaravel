<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PDF;
use App\Alumni;
use App\Jurusan;
use App\Prodi;
use App\Kelulusan;

class LaporanController extends Controller
{
    public function alumni()
    {
        $alumni = Alumni::all();
        $pdf = \PDF::loadView('admin.laporan.alumni',['alumni'=>$alumni])->setPaper('a4', 'landscape');
        return $pdf->stream();
    }

    public function prodi()
    {
        $prodi = Prodi::all();
        $pdf = \PDF::loadView('admin.laporan.prodi',['prodi'=>$prodi])->setPaper('a4', 'portrait');

        return $pdf->stream();
    }

    public function jurusan()
    {
        $jurusan = Jurusan::all();
        $pdf = \PDF::loadView('admin.laporan.jurusan',['jurusan'=>$jurusan])->setPaper('a4', 'portrait');

        return $pdf->stream();
    }

    public function angkatan()
    {
        $angkatan = Kelulusan::all();
        $pdf = \PDF::loadView('admin.laporan.angkatan',['angkatan'=>$angkatan])->setPaper('a4', 'portrait');

        return $pdf->stream();
    }




}
