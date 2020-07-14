@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-4">
            <div class="profile-card-4 z-depth-3">
                <div class="card">
                    <div class="card-body text-center bg-primary rounded-top">
                        <div class="user-box">
                            <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="user avatar">
                        </div>
                        <h5 class="mb-1 text-white">{{ Auth::user()->name }}</h5>
                        <h6 class="text-light">{{ Auth::user()->pekerjaan }}</h6>
                    </div>
                    <div class="card-body">
                        <ul class="list-group shadow-none">
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
                                    <i class="fa fa-globe"></i>
                                </div>
                                <div class="list-details">
                                    <span>{{ Auth::user()->pekerjaan }}</span>
                                    <small>Pekerjaan</small>
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
                    <ul class="nav nav-pills nav-pills-primary nav-justified">
                        <li class="nav-item">
                            <a href="javascript:void();" data-target="#edit" data-toggle="pill" class="nav-link"><i
                                    class="icon-note"></i> <span class="hidden-xs">Edit</span></a>
                        </li>
                    </ul>
                        <div class="tab-pane" id="edit">
                            <form action="{{route('alumni.update',$alumni->id )}}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Nama</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" name="name" value="{{ $alumni->name }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Nim</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" name="nim" value="{{ $alumni->nim }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Judul Tugas Akhir</label>
                                    <div class="col-lg-9">
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="tugas_akhir">{{ $alumni->tugas_akhir }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Email</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" name="email" type="email" value="{{ $alumni->email }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Change profile</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="file">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Telepon</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="number" name="telepon" value="{{ $alumni->telepon }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Address</label>
                                    <div class="col-lg-9">
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Jenis Kelamin</label>
                                <div class="col-lg-5">
                                    <select name="jenis_kelamin" id="" class="form-control">
                                        <option value="">--Pilih Gender--</option>
                                        <option value="pria">Pria</option>
                                        <option value="wanita">Wanita</option>
                                    </select>
                                </div>
                                </div>
                                <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Jurusan</label>
                                <div class="col-lg-5">
                                    <select name="jurusan_id" class="form-control" required>
                                    <option value="">Pilih</option>
                                    @foreach ($jurusan as $j)
                                        <option value="{{ $j->id }}" {{  $alumni->jurusan_id == $j->id ? 'selected':'' }}>{{ $j->jurusan }}</option>
                                    @endforeach
                                    </select>
                                </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Angkatan</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" name="angkatan" value="{{ $alumni->angkatan }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Ipk</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" name="ipk" value="{{ $alumni->ipk }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Tahun Lulus</label>
                                    <div class="col-lg-5">
                                        <select name="tahun_lulus" id="" class="form-control">
                                            <option value="">--Pilh Tahun Lulus--</option>
                                            @foreach($lulus as $l)
                                                <option value="{{$l->tahun}}" {{  $alumni->tahun_lulus == $l->tahun ? 'selected':'' }}>{{$l->tahun}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Status</label>
                                <div class="col-lg-5">
                                    <select name="status" id="" class="form-control">
                                        <option value="">--Pilh Status--</option>
                                        <option value="1" {{  $alumni->kerja == 1 ? 'selected':'' }}>Bekerja</option>
                                        <option value="2" {{  $alumni->kerja == 2 ? 'selected':'' }}>Belum Bekerja</option>
                                    </select>
                                </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Tahun Mulai Kerja</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" name="tahun_mulai_kerja" type="text" value="{{ $alumni->tahun_mulai_kerja }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Pekerjaan</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="pekerjaan" name="pekerjaan" value="{{ $alumni->pekerjaan }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Posisi</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="posisi" name="posisi" value="{{ $alumni->posisi }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Tanggung Jawab Khusus</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="tanggung_jawab_khusus" name="tanggung_jawab_khusus" value="{{ $alumni->tanggung_jawab_khusus }}">
                                    </div>
                                </div>
                                <div class="border border-danger pt-3 mb-3">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Password</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="password" value="11111122333">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Confirm password</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="password" value="11111122333">
                                    </div>
                                </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label"></label>
                                    <div class="col-lg-9">
                                        <input type="reset" class="btn btn-secondary" value="Cancel">
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
