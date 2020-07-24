@extends('layouts.admin')

@section('title')
<title>Admin - Ikatan Alumni</title>
@endsection

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
                <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" id="judul" value="{{old('judul')}}">
                @error('judul')
                  <small class="form-text text-muted">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="my-editor" >Isi Postingan</label>
                <textarea class="form-control @error('postingan') is-invalid @enderror" name="postingan" id="my-editor" cols="30" rows="10">{{old('postingan')}}</textarea>
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
<!-- ckeditor 5 -->
<script src="{{asset('sbadmin/vendor/ckeditor5/ckeditor.js')}}"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#my-editor'))
        .catch( error => {
            console.error( error );
        } );
</script>

<!-- ckeditor 4 dengan fungsi upload image -->
<!-- <script src="{{asset('sbadmin/vendor/ckeditor/ckeditor.js')}}"></script> -->
<!-- <script>
        CKEDITOR.replace('my-editor', {
            filebrowserUploadUrl: "{{route('admin.post.image', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });
      </script> -->

@endpush