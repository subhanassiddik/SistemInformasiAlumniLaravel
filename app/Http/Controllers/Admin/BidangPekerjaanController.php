<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\BidangPekerjaan;

class BidangPekerjaanController extends Controller
{
    public function index()
    {
        $BidangPekerjaan = BidangPekerjaan::All();
        return view('admin.BidangPekerjaan.index',compact('BidangPekerjaan'));
    }

    public function store(Request $request)
    {   
        
        $this->validate($request, [
            'name' => 'required|string|max:100',
        ]);

        BidangPekerjaan::create([
            'name' => $request->name
        ]);

        return redirect(route('admin.bidang_pekerjaan.index'))->with('success','Bidang Pekerjaan Berhasil Di tambah');
    }

    public function update(Request $request,$id)
    {   
        $bp = BidangPekerjaan::findOrFail($id);
        
        $bp->update([
            'name'=>$request->name
        ]);

        return redirect(route('admin.bidang_pekerjaan.index'))->with('edit','Bidang Pekerjaan Berhasil Di Ubah');
    }

    public function destroy($id)
    {
        $bp = BidangPekerjaan::findOrFail($id);
        $bp->delete();

        return redirect(route('admin.bidang_pekerjaan.index'))->with('destroy','Bidang Pekerjaan Berhasil Di Hapus');
    }
}
