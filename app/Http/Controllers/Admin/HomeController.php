<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Alumni;

class HomeController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {   

        $total = Alumni::all()->count();
        $bekerja = Alumni::where('kerja',1)->count();
        $belumbekerja = Alumni::where('kerja',2)->count();

        return view('admin.home',compact('total','bekerja','belumbekerja'));
    }

}
