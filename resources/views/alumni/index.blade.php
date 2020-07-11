@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-2">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Alumni</h6>
      </div>
    </div>

    <div class="card shadow mb-2">  
      <div class="card-body">
        <div class="row">
          <div class="col-lg-6">
            <a class="btn btn-primary" href="{{route('admin.alumni.create')}}" role="button"><i class="fa fa-fw fa-plus"></i> Tambah Data Alumni</a>
          </div>
            <div class="col-lg-6">
                <form action="{{route('admin.alumni.index')}}" method="GET">
                    @csrf
                    <select name="kerja" class="form-control float-right w-50" >
                      <option value="">Pilih Status</option>
                      <option value="1">Bekerja</option>
                      <option value="2">Tidak Bekerja</option>
                    </select>
                    <button type="submit" class="btn btn-primary float-right mr-2">Filter</button>
                
                </form>
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
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Action</th>
                <th>Nama</th>
                <th>Nim</th>
                <th>Email</th>
                <th>Telepon</th>
                <th>Status</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>Action</th>
                <th>Nama</th>
                <th>Nim</th>
                <th>Email</th>
                <th>Telepon</th>
                <th>Status</th>
              </tr>
            </tfoot>
            <tbody>
            @foreach($alumni as $al)
              <tr>
                <td>
                <form action="{{route('admin.alumni.delete',$al->id)}}" method="post" class="d-inline">
											@csrf
											@method('delete')
											<button type="submit" class="btn btn-danger">Delete</button>
                </form>
                <a class="btn btn-warning" href="{{route('admin.alumni.edit',$al->id)}}" role="button">Edit</a>
                <a class="btn btn-info" href="#" role="button">Show</a>
                </td>
                <td>{{$al->name}}</td>
                <td>{{$al->nim}}</td>
                <td>{{$al->email}}</td>
                <td>{{$al->telepon}}</td>
                <td>
                    @if($al->kerja == 1)
                    kerja
                    @else
                    belum kerja
                    @endif                    
                </td>
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
    $('#dataTable').DataTable({
        dom:'lBfrtip',
        buttons: [
          'copy','print','excel', 'pdf',
            {
                extend: 'print',
                text: 'Print selected',
                exportOptions: {
                    modifier: {
                        selected: null
                    }
                }
            }
        ],
        select : true,         
      });
} );
</script>
@endpush