<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Alumni;

class FrontController extends Controller
{
    public function index()
    {
        $total = Alumni::all()->count();
        $kerja = Alumni::where('kerja', 1)->count();
        $belumkerja = Alumni::where('kerja', 2)->count();
        return view('front.index',compact('kerja','belumkerja','total'));
    }
}
