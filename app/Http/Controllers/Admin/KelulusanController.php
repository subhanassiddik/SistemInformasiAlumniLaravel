<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Kelulusan;

class KelulusanController extends Controller
{
    public function index()
    {
        $year = date('Y');
        $kelulusan = Kelulusan::all();
        
        return view('admin.kelulusan.index',compact('kelulusan','year'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'tahun' => 'required',
            'jumlah' => 'required|string|max:100',
        ]);

        Kelulusan::create([
            'tahun' => $request->tahun,
            'jumlah' => $request->jumlah
        ]);

        return redirect(route('admin.kelulusan.index'))->with('success','Angkatan/Alumni Berhasil Di Tambahkan');
    }

    public function update(Request $request, $id)
    {
        $kelulusan = Kelulusan::findOrFail($id);

        $kelulusan->update([
            'tahun' => $request->tahun,
            'jumlah' => $request->jumlah
        ]);

        return redirect(route('admin.kelulusan.index'))->with('edit','Angkatan/Alumni Berhasil Di edit');
    }

    public function destroy($id)
    {
        $kelulusan = Kelulusan::findOrFail($id);
        $kelulusan->delete();

        return redirect(route('admin.kelulusan.index'))->with('destroy','Angkatan/Alumni Berhasil Di Hapus');

    }

}
