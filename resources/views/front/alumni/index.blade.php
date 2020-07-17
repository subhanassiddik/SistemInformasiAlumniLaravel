@extends('layouts.front')

@section('content')
    <!-- Begin Page Content -->
    <div class="container">

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
                <td>{{$al->jurusan->jurusan}}</td>
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
                }
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