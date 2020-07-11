@extends('layouts.admin')

@section('content')

<!-- Begin Page Content -->
<div class="container">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"> <i class="fa fa-fw fa-plus" ></i> Berita Alumni</h1>

<div class="row">

  <div class="col-lg-12">

    <!-- Circle Buttons -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Input</h6>
      </div>
      <div class="card-body">
      
      <form action="{{ route('admin.ikatan_alumni.store') }}" method="post">
            
            @csrf  
            <div class="form-group">
                <label for="judul">Judul</label>
                <input type="text" name="judul" class="form-control" id="judul" value="{{old('judul')}}">
                @error('judul')
                  <small class="form-text text-muted">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="postingan">Isi Postingan</label>
                <textarea class="form-control" name="postingan" id="postingan" cols="30" rows="10">{{old('postingan')}}</textarea>
                @error('postingan')
                  <small class="form-text text-muted">{{$message}}</small>
                @enderror
            </div>

        <button type="submit" class="btn btn-primary">Tambah</button>
       
        </form>
      </div>
    </div>
   
  </div>

</div>

</div>
<!-- /.container-fluid -->


@endsection

@push('script')
<script src="{{asset('sbadmin/vendor/tinymce/tinymce.min.js')}}" referrerpolicy="origin"></script>
<script>
      tinymce.init({
        selector: '#postingan'
      });
</script>
@endpush