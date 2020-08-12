@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-4">
            <div class="profile-card-4 z-depth-3">
                <div class="card">
                    <div class="card-body text-center bg-primary rounded-top">
                        <div class="user-box">
                            <img src="{{asset('/file_alumni_profil/'.Auth::user()->photo)}}" alt="user avatar">
                        </div>
                        <h5 class="mb-1 text-white">{{ Auth::user()->name }}</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group shadow-none">
                            <li class="list-group-item">
                                <div class="list-icon">
                                    <i class="fa fa-phone-square"></i>
                                </div>
                                <div class="list-details">
                                    <span>{{ Auth::user()->nim }}</span>
                                    <small>Nomor Induk Mahasiswa</small>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="list-icon">
                                    <i class="fa fa-phone-square"></i>
                                </div>
                                <div class="list-details">
                                    <span>{{ Auth::user()->telepon }}</span>
                                    <small>Mobile Number</small>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="list-icon">
                                    <i class="fa fa-envelope"></i>
                                </div>
                                <div class="list-details">
                                    <span>{{ Auth::user()->email }}</span>
                                    <small>Email Address</small>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="list-icon">
                                    <i class="fa fa-envelope"></i>
                                </div>
                                <div class="list-details">
                                    <span>{{ Auth::user()->alamat }}</span>
                                    <small>Alamat</small>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="card-footer text-center">
                        <a href="javascript:void()" class="btn-social btn-facebook waves-effect waves-light m-1"><i
                                class="fa fa-facebook"></i></a>
                        <a href="javascript:void()" class="btn-social btn-google-plus waves-effect waves-light m-1"><i
                                class="fa fa-google-plus"></i></a>
                        <a href="javascript:void()"
                            class="list-inline-item btn-social btn-behance waves-effect waves-light"><i
                                class="fa fa-behance"></i></a>
                        <a href="javascript:void()"
                            class="list-inline-item btn-social btn-dribbble waves-effect waves-light"><i
                            class="fa fa-dribbble"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card z-depth-3">
                <div class="card-body">
                @if (session('edit'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session('edit')}}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                    <ul class="nav nav-pills nav-pills-primary nav-justified">
                        <li class="nav-item">
                            <a href="javascript:void();" data-target="#profile" data-toggle="pill"
                                class="nav-link active show"><i class="icon-user"></i> <span
                                    class="hidden-xs">Profile</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:void();" data-target="#edit" data-toggle="pill" class="nav-link"><i
                                    class="icon-note"></i> <span class="hidden-xs">Edit</span></a>
                        </li>
                    </ul>
                    <div class="tab-content p-3">
                        <div class="tab-pane active show" id="profile">
                            <div class="row">
                                <div class="col-md-6">
                                    <h6><strong>{{ Auth::user()->tugas_akhir }}</strong></h6>
                                    <small>Judul Tugas Akhir</small>
                                    <hr>
                                    <h6><strong>Manajemen Informatka</strong></h6>
                                    <small>Prodi</small>
                                    <hr>
                                    <h6><strong>{{ Auth::user()->jurusan_id !=null?Auth::user()->jurusan->jurusan:''}}</strong></h6>
                                    <small>Konsentrasi</small>
                                    <hr>
                                    <h6><strong>{{ Auth::user()->angkatan }}</strong></h6>
                                    <small>Angkatan</small>
                                    <hr>
                                    <h6><strong>{{ Auth::user()->ipk }}</strong></h6>
                                    <small>IPK</small>
                                    <hr>
                                    <h6><strong>{{ Auth::user()->tahun_lulus }}</strong></h6>
                                    <small>Tahun Lulus</small>
                                    <hr>
                                </div>
                                <div class="col-md-6">
                                    <h6><strong>{{ Auth::user()->pekerjaan_id !=null?Auth::user()->pekerjaan->name:''}}</strong></h6>
                                    <small>Pekerjaan</small>
                                    <hr>
                                    <h6><strong>{{ Auth::user()->tahun_mulai_kerja }}</strong></h6>
                                    <small>Tahun Mulai Kerja</small>
                                    <hr>
                                    <h6><strong>{{ Auth::user()->posisi }}</strong></h6>
                                    <small>Posisi Di Pekerjaan</small>
                                    <hr>
                                    <h6><strong>{{ Auth::user()->tanggung_jawab_khusus }}</strong></h6>
                                    <small>Tanggung Jawab Khusus</small>
                                    <hr>
                                </div>
                            </div>
                            <!--/row-->
                        </div>
                        <div class="tab-pane" id="edit">
                            <form action="{{route('alumni.update',Auth::user()->id )}}" method="POST" enctype="multipart/form-data" >
                                @csrf
                                @method('PUT')
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Nama</label>
                                    <div class="col-lg-9">
                                        <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{old('name')?old('name'):Auth::user()->name}}">
                                        @error('name')
                                            <small class="form-text text-muted">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Nim</label>
                                    <div class="col-lg-9">
                                        <input class="form-control @error('nim') is-invalid @enderror" type="number" name="nim" value="{{Auth::user()->nim}}" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Judul Tugas Akhir</label>
                                    <div class="col-lg-9">
                                    <textarea class="form-control @error('tugas_akhir') is-invalid @enderror" id="exampleFormControlTextarea1" rows="3" name="tugas_akhir">{{old('tugas_akhir')?old('tugas_akhir'):Auth::user()->tugas_akhir}}</textarea>
                                    @error('tugas_akhir')
                                        <small class="form-text text-muted">{{$message}}</small>
                                    @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Email</label>
                                    <div class="col-lg-9">
                                        <input class="form-control @error('email') is-invalid @enderror" name="email" type="email" value="{{ old('email')?old('email'):Auth::user()->email }}">
                                        @error('email')
                                            <small class="form-text text-muted">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Change profile</label>
                                    <div class="col-lg-9">
                                        <input class="form-control @error('photo') is-invalid @enderror" type="file" name="photo" value="{{Auth::user()->photo}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Telepon</label>
                                    <div class="col-lg-9">
                                        <input class="form-control @error('telepon') is-invalid @enderror" type="number" name="telepon" value="{{ old('telepon')?old('telepon'):Auth::user()->telepon }}">
                                        @error('telepon')
                                            <small class="form-text text-muted">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">alamat</label>
                                    <div class="col-lg-9">
                                    <textarea class="form-control @error('alamat') is-invalid @enderror" id="exampleFormControlTextarea1" rows="3" name="alamat">{{ old('alamat')?old('alamat'):Auth::user()->alamat }}</textarea>
                                    @error('alamat')
                                            <small class="form-text text-muted">{{$message}}</small>
                                    @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Jenis Kelamin</label>
                                <div class="col-lg-9">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="jenis_kelamin" value="pria" {{ Auth::user()->jenis_kelamin == 'pria' ? 'checked' :''}}>
                                    <label class="form-check-label" for="inlineCheckbox1">Pria</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="jenis_kelamin" value="wanita" {{ Auth::user()->jenis_kelamin == 'wanita' ? 'checked':''}}>
                                    <label class="form-check-label" for="inlineCheckbox2">Wanita</label>
                                </div>
                                @error('jenis_kelamin')
                                    <small class="form-text text-muted">{{$message}}</small>
                                @enderror
                                </div>
                                </div>
                                <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Jurusan</label>
                                <div class="col-lg-5">
                                    <select name="jurusan_id" class="form-control" required>
                                    <option value="">Pilih</option>
                                    @foreach ($jurusan as $j)
                                        <option value="{{ $j->id }}" {{  Auth::user()->jurusan_id == $j->id ? 'selected':'' }}>{{ $j->jurusan }}</option>
                                    @endforeach
                                    </select>
                                    @error('jurusan_id')
                                        <small class="form-text text-muted">{{$message}}</small>
                                    @enderror
                                </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Angkatan</label>
                                    <div class="col-lg-9">
                                        <input class="form-control @error('angkatan') is-invalid @enderror" type="number" name="angkatan" value="{{ old('angkatan')?old('angkatan'):Auth::user()->angkatan }}">
                                        @error('angkatan')
                                            <small class="form-text text-muted">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Ipk</label>
                                    <div class="col-lg-9">
                                        <input class="form-control @error('ipk') is-invalid @enderror" type="text" name="ipk" value="{{old('ipk')?old('ipk'): Auth::user()->ipk }}">
                                        @error('ipk')
                                            <small class="form-text text-muted">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Tahun Lulus</label>
                                    <div class="col-lg-5">
                                        <select name="tahun_lulus" id="" class="form-control @error('tahun_lulus') is-invalid @enderror">
                                            <option value="">--Pilh Tahun Lulus--</option>
                                            @foreach($lulus as $l)
                                                <option value="{{$l->tahun}}" {{  Auth::user()->tahun_lulus == $l->tahun ? 'selected':'' }}>{{$l->tahun}}</option>
                                            @endforeach
                                        </select>
                                        @error('tahun_lulus')
                                            <small class="form-text text-muted">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Status</label>
                                <div class="col-lg-5">
                                    <select name="status" id="" class="form-control @error('status') is-invalid @enderror">
                                        <option value="">--Pilh Status--</option>
                                        <option value="1" {{  Auth::user()->kerja == 1 ? 'selected':'' }}>Bekerja</option>
                                        <option value="2" {{  Auth::user()->kerja == 2 ? 'selected':'' }}>Belum Bekerja</option>
                                    </select>
                                    @error('status')
                                        <small class="form-text text-muted">{{$message}}</small>
                                    @enderror
                                </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Tahun Mulai Kerja</label>
                                    <div class="col-lg-9">
                                        <input class="form-control @error('tahun_mulai_kerja') is-invalid @enderror" name="tahun_mulai_kerja" type="number" value="{{ old('tahun_mulai_kerja')?old('tahun_mulai_kerja'):Auth::user()->tahun_mulai_kerja }}">
                                        @error('tahun_mulai_kerja')
                                            <small class="form-text text-muted">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Pekerjaan</label>
                                    <div class="col-lg-5">
                                        <select name="pekerjaan_id" id="" class="form-control @error('pekerjaan_id') is-invalid @enderror">
                                            <option value="">--Pilh Pekerjaan--</option>
                                            @foreach($pekerjaan as $p)
                                                <option value="{{$p->id}}" {{  Auth::user()->pekerjaan_id == $p->id ? 'selected':'' }}>{{$p->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('pekerjaan_id')
                                            <small class="form-text text-muted">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Posisi</label>
                                    <div class="col-lg-9">
                                        <input class="form-control @error('posisi') is-invalid @enderror" type="text" name="posisi" value="{{ old('posisi')?old('posisi'):Auth::user()->posisi }}">
                                        @error('posisi')
                                            <small class="form-text text-muted">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Tanggung Jawab Khusus</label>
                                    <div class="col-lg-9">
                                        <input class="form-control @error('tanggung_jawab_khusus') is-invalid @enderror" type="text" name="tanggung_jawab_khusus" value="{{ old('tanggung_jawab_khusus')?old('tanggung_jawab_khusus'):Auth::user()->tanggung_jawab_khusus }}">
                                        @error('tanggung_jawab_khusus')
                                            <small class="form-text text-muted">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="border border-danger pt-3 mb-3">
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label">Password</label>
                                        <div class="col-lg-9">
                                            <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" placeholder="**********">
                                            @error('password')
                                                <small class="form-text text-muted">{{$message}}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label">Confirm password</label>
                                        <div class="col-lg-9">
                                            <input class="form-control @error('password_confirmation') is-invalid @enderror" type="password" name="password_confirmation" placeholder="**********">
                                        </div>
                                    </div>
                                    <small class="text-danger">* Jangan Di isi jika tidak ingin mengubah Password</small>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-9 float-right">
                                        <button type="submit" class="btn btn-primary" >Save Changes</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
