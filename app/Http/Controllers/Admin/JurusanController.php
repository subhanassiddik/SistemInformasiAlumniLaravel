<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jurusan;
use App\Prodi;

class JurusanController extends Controller
{
    
    public function index()
    {
        $prodi = Prodi::all();
        $jurusan = Jurusan::all();
        return view('admin.jurusan.index',compact('jurusan','prodi'));
    }

    public function store(Request $request)
    {
    
        $this->validate($request, [
            'prodi_tambah' => 'required',
            'jurusan_tambah' => 'required|string|max:100',
        ]);

        Jurusan::create([
            'jurusan' => $request->jurusan,
            'prodi_id' => $request->prodi
        ]);

        return redirect(route('admin.jurusan.index'))->with('success','Jurusan Berhasil Di Tambahkan');
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'prodi' => 'required',
            'jurusan' => 'required|string|max:100',
        ]);

        $jurusan = Jurusan::findOrFail($id);

        $jurusan->update([
            'jurusan'=> $request->jurusan,
        ]);

        return redirect(route('admin.jurusan.index'))->with('edit','Jurusan Berhasil Di edit');
    }

    public function destroy($id)
    {
        $ika = Jurusan::findOrFail($id);
        $ika->delete();

        return redirect(route('admin.jurusan.index'))->with('success','Jurusan Berhasil Di Hapus');

    }
}
