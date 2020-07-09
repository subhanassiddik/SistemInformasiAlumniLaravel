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
            <div class="col-lg-6"> 
              <select name="" class="form-control">
                <option value="">Filter</option>
                <option value="">Bekerja</option>
                <option value="">Tidak Bekerja</option>
              </select>
              <button type="button" class="btn btn-primary">filter</button>
            </div>
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
                <th>Action</th>
                <th>Name</th>
                <th>Nim</th>
                <th>Email</th>
                <th>Telepon</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>Action</th>
                <th>Name</th>
                <th>Nim</th>
                <th>Email</th>
                <th>Telepon</th>
              </tr>
            </tfoot>
            <tbody>
            @foreach($alumni as $al)
              <tr>
                <td>
                <form action="{{route('admin.alumni.update',$al->id)}}" method="post" class="d-inline">
                  @csrf
                  @method('PUT')
                  <button type="submit" class="btn btn-warning">Update</button>
                </form>
                <form action="{{route('admin.alumni.delete',$al->id)}}" method="post" class="d-inline">
											@csrf
											@method('delete')
											<button type="submit" class="btn btn-danger">Delete</button>
										</form>
                </td>
                <td><input type="email" class="form-control" value="{{$al->name}}" style="border-style: none;"><span style="display:none">{{$al->name}}</span></td>
                <td><input type="email" class="form-control" value="{{$al->email}}"><span style="display:none">{{$al->email}}</span></td>
                <td><input type="email" class="form-control" value="{{$al->nim}}"><span style="display:none">{{$al->nim}}</span></td>
                <td><input type="email" class="form-control" value="{{$al->telepon}}"><span style="display:none">{{$al->telepon}}</span></td>
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
          // {
          //       extend: 'print',
          //       text: 'Print selected',
          //       exportOptions: {
          //           modifier: {
          //               selected: null
          //           }
          //       }
          //   }
        ],
        // select : true,
         
      });
      
} );
</script>
@endpush