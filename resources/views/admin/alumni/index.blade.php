@extends('layouts.admin')

@section('title')
<title>Data Alumni</title>
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-2">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"> <i class="fas fa-fw fas fa-users	"></i> Daftar Alumni</h6>
      </div>
    </div>

    <div class="card shadow mb-2">  
      <div class="card-body">
        <div class="row">
          <div class="col-lg-6">
            <a class="btn btn-primary" href="{{route('admin.alumni.create')}}" role="button"><i class="fa fa-fw fa-plus"></i> Tambah Data Alumni</a>
          </div>
            <div class="col-lg-6">
                  <form action="{{route('admin.alumni.index')}}" method="GET" class="form-inline">
                    @csrf
                    <div class="form-group mr-2">
                    <select name="jurusan_id" class="form-control">
                      <option value="">Pilih Jurusan</option>
                        @foreach ($jurusan as $val)
                          <option value="{{ $val->id }}" {{ request()->jurusan_id == $val->id ? 'selected':'' }}>{{ $val->jurusan }}</option>
                        @endforeach
                    </select>
                    </div>
                    <div class="form-group mr-2">
                    <select name="kerja" class="form-control" >
                      <option value="">Pilih Status</option>
                      <option value="1" {{ request()->kerja == 1 ? 'selected':'' }}>Bekerja</option>
                      <option value="2" {{ request()->kerja == 2 ? 'selected':'' }}>Belum Bekerja</option>
                    </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Filter</button>
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
          <table class="table table-bordered" id="dataTable">
            <thead>
              <tr>
                <th>Action</th>
                <th>Nama</th>
                <th>Nim</th>
                <th>Gender</th>
                <th>Email</th>
                <th>Telepon</th>
                <th>Status</th>
                <th>Jurusan</th>
                <th>Angkatan</th>
                <th>Ipk</th>
                <th>Lulus</th>
                <th>pekerjaan</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>=======Action=======</th>
                <th>Nama</th>
                <th>Nim</th>
                <th>Gender</th>
                <th>Email</th>
                <th>Telepon</th>
                <th>Status</th>
                <th>Jurusan</th>
                <th>Angkatan</th>
                <th>Ipk</th>
                <th>Lulus</th>
                <th>pekerjaan</th>
              </tr>
            </tfoot>
            <tbody>
            @foreach($alumni as $al)
              <tr>
                <td>
                <form action="{{route('admin.alumni.delete',$al->id)}}" method="post" class="d-inline">
											@csrf
											@method('delete')
											<button type="submit" class="btn btn-danger"> <i class="far fa-fw fa-trash-alt"></i></button>
                </form>
                <a class="btn btn-warning" href="{{route('admin.alumni.edit',$al->id)}}" role="button"><i class="far fa-fw far fa-edit"></i></a>
                <a class="btn btn-info" href="{{route('admin.alumni.show',$al->id)}}" role="button">Show</a>
                </td>
                <td>{{$al->name}}</td>
                <td>{{$al->nim}}</td>
                <td>{{$al->jenis_kelamin}}</td>
                <td>{{$al->email}}</td>
                <td>{{$al->telepon}}</td>
                <td>
                    @if($al->kerja == 1)
                    kerja
                    @else
                    belum kerja
                    @endif                    
                </td>
                <td>{{$al->jurusan_id != null?$al->jurusan->jurusan:''}}</td>
                <td>{{$al->angkatan}}</td>
                <td>{{$al->ipk}}</td>
                <td>{{$al->tahun_lulus}}</td>
                <td>{{ $al->pekerjaan_id !=null?$al->pekerjaan->name:''}}</td>
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
          'copy','searchPanes',
            
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: ':visible'
                },
            },
            {
                extend: 'pdfHtml5',
                orientation: 'landscape',
                pageSize: 'A4',
                exportOptions: {
                    columns: ':visible'
                },
            },
            {
                extend: 'print',
                orientation: 'landscape',
                exportOptions: {
                    columns: ':visible'
                },
                customize: function ( win ) {
                    $(win.document.body)
                        .css( 'font-size', '10pt' )
                        .prepend(
                            '<img src="{{asset('sbadmin/img/logotext.png')}}" style="position:absolute; top:0; left:0;opacity: 0.1;" />'
                        );
 
                    $(win.document.body).find( 'table' )
                        .addClass( 'compact' )
                        .css( 'font-size', 'inherit' );
                },
            },
            'colvis',
        ],
        scrollX: true,
        fixedColumns:   {
            leftColumns: 1
        },
      });
} );
</script>
@endpush