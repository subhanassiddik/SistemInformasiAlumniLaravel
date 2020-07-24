@extends('layouts.admin')

@section('title')
<title>Admin - Ikatan Alumni</title>
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-2">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-fw far fa-address-book"></i> Ikatan Alumni</h6>
      </div>
    </div>

    <div class="card shadow mb-2">  
      <div class="card-body">
        <div class="row">
          <div class="col-lg-6">
            <a class="btn btn-primary" href="{{route('admin.ikatan_alumni.create')}}" role="button"><i class="fa fa-fw fa-plus"></i> Posting Berita</a>
          </div>
        </div>
      </div>
    </div>

    <div class="card shadow mb-2">  
      <div class="card-body">
      @if (session('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ session('success')}}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @endif
      @if (session('destroy'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>{{ session('destroy')}}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @endif
      @if (session('edit'))
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>{{ session('edit')}}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @endif
        <div class="table-responsive">
          <table class="table table-bordered" width="100%" cellspacing="0" id="dataTable">
            <thead>
              <tr>
                <th>Action</th>
                <th>Judul</th>
                <th>Tanggal Pembuatan</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>Action</th>
                <th>Judul</th>
                <th>Tanggal Pembuatan</th>
              </tr>
            </tfoot>
            <tbody>
            @foreach($IkatanAlumni as $ika)
              <tr>
                <td>
                <form action="{{route('admin.ikatan_alumni.delete',$ika->id)}}" method="post" class="d-inline">
											@csrf
											@method('delete')
											<button type="submit" class="btn btn-danger"><i class="far fa-fw fa-trash-alt"></i></button>
                </form>
                <a class="btn btn-warning" href="{{route('admin.ikatan_alumni.edit',$ika->id)}}" role="button"><i class="far fa-fw far fa-edit"></i></a>
                <a class="btn btn-info" href="{{route('front.ikatan_alumni.show',$ika->id)}}" role="button">Show</a>
                </td>
                <td>{{$ika->judul}}</td>
                <td>{{$ika->created_at}}</td>
              </tr>
            @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>

    </div>
    <!-- /.container-fluid -->

@endsection

@push('script')
<script>
  $(document).ready(function() {
    $('#dataTable').DataTable();
} );
</script>
@endpush