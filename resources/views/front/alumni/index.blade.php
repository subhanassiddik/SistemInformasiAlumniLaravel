@extends('layouts.front')

@section('title')
<title>Daftar Alumni</title>
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container">

    <!-- DataTales Example -->
    <div class="card shadow mb-2">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-fw fas fa-users	"></i>Daftar Alumni</h6>
      </div>
    </div>

    <div class="card shadow mb-2">  
      <div class="card-body">
        <div class="row">
          <div class="col-lg-12">
                <form action="{{route('front.alumni.index')}}" method="GET" class="form-inline">
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
                </class=>
          </div>
        </div>
      </div>
    </div>

    <div class="card shadow mb-2">  
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Nama</th>
                <th>Nim</th>
                <th>Gender</th>
                <th>Jurusan</th>
                <th>Angkatan</th>
                <th>Status</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>Nama</th>
                <th>Nim</th>
                <th>Gender</th>
                <th>Jurusan</th>
                <th>Angkatan</th>
                <th>Status</th>
              </tr>
            </tfoot>
            <tbody>
            @foreach($alumni as $al)
              <tr>
                <td>{{$al->name}}</td>
                <td>{{$al->nim}}</td>
                <td>{{$al->jenis_kelamin}}</td>
                <td>{{$al->jurusan_id != null?$al->jurusan->jurusan:''}}</td>
                <td>{{$al->angkatan}}</td>
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
          'copy','excel', 'pdf','searchPanes',
            {
                extend: 'print',
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