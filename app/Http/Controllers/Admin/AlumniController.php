<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Alumni;
use App\Imports\AlumniImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class AlumniController extends Controller
{

    public function index(Request $request)
    {   
        // dd(request()->kerja);
        if (!empty(request()->kerja))
            $alumni = alumni::where('kerja',request()->kerja)->get();
        else
            $alumni = alumni::all();
            
        return view('admin.alumni.index',compact('alumni'));
    }

    public function create()
    {
        return view('admin.alumni.create');
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
        
        return redirect(route('admin.alumni.index'))->with('success', 'Data Alumni Berhasil Ditambah ');
    }

    public function edit($id)
    {
        $alumni = Alumni::findOrFail($id);

        return view('admin.alumni.edit',compact('alumni'));
    }


    public function update(Request $request, $id)
    {   
        $this->validate($request, [
            'name' => 'required|string|max:100',
            'nim' => 'required',
            'email' => 'required|email',
            'telepon' => 'required'
        ]);

        $alumni = Alumni::findOrfail($id);

        $alumni->update([
            'name' => $request->name,
            'nim' => $request->nim,
            'email' => $request->email,
            'password' => bcrypt($request->nim),
            'telepon' => $request->telepon
        ]);

        return redirect(route('admin.alumni.index'))->with('edit', 'Data Alumni Berhasil Edit ');
    }

    public function destroy($id)
    {
        $alumni = Alumni::findOrFail($id);
        $alumni->delete();

        return redirect(route('admin.alumni.index'))->with('destroy', 'Data Alumni Berhasil Hapus ');
    }

    public function import_excel(Request $request) 
	{  
		
		$this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx'
		]);
		// menangkap file excel
		$file = $request->file('file');
		// membuat nama file unik
		$nama_file = rand().$file->getClientOriginalName();
		// upload ke folder file_siswa di dalam folder public
		$file->move('file_alumni_excel',$nama_file);
        // import data
        try {
            Excel::import(new AlumniImport, public_path('/file_alumni_excel/'.$nama_file)); 
        } catch (\Exception $ex) {
            return back()->with('error','Ada yang salah, Cek format penulisan.');
        }
		
        return redirect(route('admin.alumni.index'))->with('success', 'Data Alumni Excel Berhasil Ditambahkan');
	}
}
