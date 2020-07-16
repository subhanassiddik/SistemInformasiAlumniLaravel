<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\IkatanAlumni;

class IkatanAlumniController extends Controller
{
    public function index()
    {
        $ika = IkatanAlumni::latest()->paginate(10);
        return view('front.ikatanalumni.index',compact('ika'));
    }
}
