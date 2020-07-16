<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Alumni;

class AlumniController extends Controller
{

    public function index(Request $request)
    {   
        if (!empty(request()->kerja))
            $alumni = alumni::where('kerja',request()->kerja)->get();
        else
            $alumni = alumni::all();
            
        return view('front.alumni.index',compact('alumni'));
    }
}
