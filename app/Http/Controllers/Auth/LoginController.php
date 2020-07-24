<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    protected $redirectTo = '/alumni';

    public function __construct()
    {
        $this->middleware('guest')->except(['logout','logoutUser']);
    }

    public function nim()
    {
        return 'nim';
    }

    public function logoutUser()
    {
        Auth::guard('web')->logout();
        return redirect('/');
    } 

}
