<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Alumni;
use App\Jurusan;

class AlumniController extends Controller
{

    public function index(Request $request)
    {   
        $alumni = Alumni::orderBy('jurusan_id', 'desc')->get();
        
        if (!empty(request()->kerja)){
        $alumni = alumni::where('kerja',request()->kerja)->orderBy('jurusan_id', 'desc')->get();        
        }

        if (!empty(request()->jurusan_id)){
        $alumni = alumni::where('jurusan_id',request()->jurusan_id)->orderBy('jurusan_id', 'desc')->get();        
        }
        
        $jurusan = Jurusan::all();   
        return view('front.alumni.index',compact('alumni','jurusan'));
    }

}
