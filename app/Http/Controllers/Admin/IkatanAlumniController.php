<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\IkatanAlumni;

class IkatanAlumniController extends Controller
{

    public function index()
    {   
        $IkatanAlumni = IkatanAlumni::All();

        return view('admin.IkatanAlumni.index',compact('IkatanAlumni'));
    }

    public function create()
    {
        return view('admin.IkatanAlumni.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required|string|max:100',
            'postingan' => 'required',
        ]);

        IkatanAlumni::create([
            'judul'=> $request->judul,
            'postingan' => $request->postingan
        ]);

        return redirect(route('admin.ikatan_alumni.index'))->with('success','Posting Berita Berhasil');
    }

    public function edit($id)
    {
        $ika = IkatanAlumni::findOrFail($id);
        
        return view('admin.IkatanAlumni.edit',compact('ika'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'judul' => 'required|string|max:100',
            'postingan' => 'required',
        ]);

        $ika = IkatanAlumni::findOrFail($id);
        
        $ika->update([
            'judul'=> $request->judul,
            'postingan' => $request->postingan
        ]);

        return redirect(route('admin.ikatan_alumni.index'))->with('success','Berita Berhasil Di Edit');

    }

    public function destroy($id)
    {
        $ika = IkatanAlumni::findOrFail($id);
        $ika->delete();

        return redirect(route('admin.ikatan_alumni.index'))->with('destroy', 'Berita Berhasil Di Hapus ');
    }
}
