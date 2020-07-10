@extends('layouts.admin')

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
                <input type="text" name="name" class="form-control" id="name" value="{{old('nim')}}">
                @error('name')
                  <small class="form-text text-muted">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="nim">Nim</label>
                <input type="number" name="nim" class="form-control" id="nim" value="{{old('nim')}}">
                @error('nim')
                  <small class="form-text text-muted">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{old('email')}}">
                @error('email')
                  <small class="form-text text-muted">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="telepon">No Telp</label>
                <input type="number" name="telepon" class="form-control" id="telepon" value="{{old('telepon')}}">
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
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Batch Input</button>
        </div>
        </a>
      </div>
    </div>

  </div>

</div>

</div>
<!-- /.container-fluid -->


@endsection