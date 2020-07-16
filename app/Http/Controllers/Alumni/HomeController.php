<?php

namespace App\Http\Controllers\Alumni;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jurusan;
use App\Kelulusan;
use App\Alumni;
use App\BidangPekerjaan;
use Image;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $pekerjaan = BidangPekerjaan::all();
        $lulus = Kelulusan::all();
        $jurusan = Jurusan::all();
        return view('alumni.home',compact('jurusan','lulus','pekerjaan'));
    }

    public function edit($id)
    {
        $alumni= Alumni::findOrfail($id);
        $lulus = Kelulusan::all();
        $jurusan = Jurusan::all();
        return view('alumni.edit',compact('alumni','jurusan','lulus'));
    }

    public function update(Request $request, $id)
    {   
        
        $this->validate($request, [
            'name' => 'required|string|max:100',
            'tugas_akhir' => 'required', 
            'email' => 'required|email',
            'password' => 'nullable|confirmed',
            'telepon' => 'required|max:13',
            'jenis_kelamin' => 'required',  
            'jurusan_id' => 'required',
            'tahun_lulus' => 'required',
            'status' => 'required',
        ]);

        
        $alumni = Alumni::findOrFail($id);
        
        $password = $request->password != '' ? bcrypt($request->password):$alumni->password;
        
        if ($request->hasFile('photo')) 
        {
            $avatar = $request->file('photo');
            $filename = time().'.'.$avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300,300)->save(public_path('/file_alumni_profil/'.$filename));
        }else{
            $filename = $alumni->photo;
        }
        
        $alumni->update([
            'photo' => $filename,
            'name'=>$request->name,
            'nim'=>$request->nim,
            'tugas_akhir'=>$request->tugas_akhir,
            'email'=>$request->email,
            'password'=>$password,
            'telepon'=>$request->telepon,
            'alamat'=>$request->alamat,
            'jenis_kelamin'=>$request->jenis_kelamin,
            'jurusan_id'=>$request->jurusan_id,
            'angkatan'=>$request->angkatan,
            'ipk'=>$request->ipk,
            'tahun_lulus'=>$request->tahun_lulus,
            'kerja'=>$request->status,
            'tahun_mulai_kerja'=>$request->tahun_mulai_kerja,
            'pekerjaan_id'=>$request->pekerjaan_id,
            'posisi'=>$request->posisi,
            'tanggung_jawab_khusus'=>$request->tanggung_jawab_khusus
        ]);

        return redirect(route('alumni.home'))->with('edit','Data berhasil di Edit');
    }

}
