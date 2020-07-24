@extends('layouts.admin')

@section('title')
<title>Data Alumni</title>
@endsection

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"> <i class="fa fa-fw fa-plus" ></i> Data Mahasiswa</h1>

<div class="row">

  <div class="col-lg-6">

    <!-- Circle Buttons -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Input</h6>
      </div>
      <div class="card-body">
      
      <form action="{{ route('admin.alumni.store') }}" method="post">
            
            @csrf  
            <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{old('nim')}}">
                @error('name')
                  <small class="form-text text-muted">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="nim">Nim</label>
                <input type="number" name="nim" class="form-control @error('nim') is-invalid @enderror" id="nim" value="{{old('nim')}}">
                @error('nim')
                  <small class="form-text text-muted">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{old('email')}}">
                @error('email')
                  <small class="form-text text-muted">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="telepon">No Telp</label>
                <input type="number" name="telepon" class="form-control @error('telepon') is-invalid @enderror" id="telepon" value="{{old('telepon')}}">
                @error('telepon')
                  <small class="form-text text-muted">{{$message}}</small>
                @enderror
            </div>

        <button type="submit" class="btn btn-primary">Tambah</button>
       
        </form>
      </div>
    </div>
   
  </div>

  <div class="col-lg-6">

    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Input Banyak</h6>
      </div>
      <div class="card-body">
        @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>{{ session('error')}}</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @endif
        <div class="form-group">
            <form method="post" action="{{route('admin.alumni.import_excel')}}" enctype="multipart/form-data">
            @csrf
              <div class="form-group">
                <input name="file" type="file" class="form-control-file @error('file') is-invalid @enderror" >
                @error('file')
                  <small class="form-text text-muted">{{$message}}</small>
                @enderror
              </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
            </form>
        </div>
      </div>
    </div>
    <div class="alert alert-danger" role="alert">
          <strong>Peringatan !!! Silahkan Download Contoh Struktur Penulisan <a href="{{asset('/file_alumni_excel/contoh/Contoh.xlsx')}}"> di Sini </a>, Agar Urutan Data Sesuai .</strong>   
    </div>
  </div>

</div>

</div>
<!-- /.container-fluid -->


@endsection