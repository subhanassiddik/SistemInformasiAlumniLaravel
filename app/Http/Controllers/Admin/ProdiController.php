<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Prodi;

class ProdiController extends Controller
{

    public function index()
    {   
        $prodi = Prodi::all();
        return view('admin.prodi.index',compact('prodi'));
    }

    public function store(Request $request)
    {   
        
        $this->validate($request, [
            'prodi' => 'required|string|max:100',
        ]);

        Prodi::create([
            'prodi' => $request->prodi
        ]);

        return redirect(route('admin.prodi.index'))->with('success','Prodi Berhasil Di tambah');
    }


    public function update(Request $request,$id)
    {   
        $prodi = Prodi::findOrFail($id);
        
        $prodi->update([
            'prodi'=>$request->prodi
        ]);

        return redirect(route('admin.prodi.index'))->with('edit','Prodi Berhasil Di Ubah');

    }

    public function destroy($id)
    {
        $ika = Prodi::findOrFail($id);
        $ika->delete();

        return redirect(route('admin.prodi.index'))->with('destroy','Prodi Berhasil Di Hapus');
    }
}
