<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Kelulusan;
use App\Alumni;

class GrafikController extends Controller
{
    public function index()
    {
        $kelulusan = Kelulusan::get();

        $tahun_kelulusan=[];
        $jumlah=[];

        foreach ($kelulusan as $kel) {
            $tahun_kelulusan[] = $kel->tahun;
            $jumlah[]=$kel->jumlah;
        }
        
        return view('front.grafik.index',compact('tahun_kelulusan','jumlah'));
    }
}
