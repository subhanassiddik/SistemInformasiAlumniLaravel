@extends('layouts.admin')

@section('title')
<title>Data Alumni</title>
@endsection

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"> <i class="fa fa-fw fa-plus" ></i>Edit Data Alumni </h1>

<div class="row">

  <div class="col-lg-6">

    <!-- Circle Buttons -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Input</h6>
      </div>
      <div class="card-body">
      
      <form action="{{ route('admin.alumni.update',$alumni->id) }}" method="post">
            @csrf
            @method('PUT')  
            <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"" id="name" value="{{old('name')?old('name'):$alumni->name}}">
                @error('name')
                  <small class="form-text text-muted">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="nim">Nim</label>
                <input type="number" name="nim" class="form-control @error('nim') is-invalid @enderror"" id="nim" value="{{old('nim')?old('nim'):$alumni->nim}}">
                @error('nim')
                  <small class="form-text text-muted">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"" id="email" aria-describedby="emailHelp" value="{{old('email')?old('email'):$alumni->email}}">
                @error('email')
                  <small class="form-text text-muted">{{$message}}</small>
                @enderror    
            </div>
            <div class="form-group">
                <label for="telepon">No Telp</label>
                <input type="number" name="telepon" class="form-control telepon" id="telepon" value="{{old('telepon')?old('telepon'):$alumni->telepon}}">
                @error('telepon')
                  <small class="form-text text-muted">{{$message}}</small>
                @enderror
            </div>

        <button type="submit" class="btn btn-primary">Update</button>
       
        </form>
      </div>
    </div>
   
  </div>

</div>

</div>
<!-- /.container-fluid -->


@endsection