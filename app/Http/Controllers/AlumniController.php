<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alumni;

class AlumniController extends Controller
{

    public function index()
    {   
        $alumni = alumni::all();
        return view('alumni.index',compact('alumni'));
    }

    public function create()
    {
        return view('alumni.create');
    }

    public function store(Request $request)
    {
        
        $this->validate($request, [
            'name' => 'required|string|max:100',
            'nim' => 'required|unique:Alumni,nim',
            'email' => 'required|email',
            'telepon' => 'required'
        ]);

        Alumni::create([
            'name' => $request->name,
            'nim' => $request->nim,
            'email' => $request->email,
            'password' => bcrypt($request->nim),
            'telepon' => $request->telepon
        ]);
        
        return redirect(route('admin.alumni.index'));
    }

    public function update(Request $request, $id)
    {   
        dd($request);
        $alumni = Alumni::where('id',$id)->first();
        $alumni->update([
            'name' => $request->name,
            'nim' => $request->nim,
            'email' => $request->email,
            'password' => bcrypt($request->nim),
            'telepon' => $request->telepon
        ]);

        return redirect(route('admin.alumni.index'));
    }

    public function destroy($id)
    {
        $alumni = Alumni::findOrFail($id);
        $alumni->delete();

        return redirect(route('admin.alumni.index'));
    }
}
