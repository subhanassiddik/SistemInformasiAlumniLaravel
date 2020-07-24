@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-2">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Bidang Pekerjaan</h6>
      </div>
    </div>

    <div class="card shadow mb-2">  
      <div class="card-body">
        <div class="row">
            <form class="form-inline" method="post" action="{{route('admin.bidang_pekerjaan.store')}}">
                @csrf
                <div class="form-group mx-sm-3 mb-2">
                    <input name="name" type="text" class="form-control" placeholder="Nama Bidang Pekerjaan">
                </div>
                <button type="submit" class="btn btn-primary mb-2">Tambah Bidang Pekerjaan</button>
            </form>
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
                <th>Bidang Pekerjaan</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>Action</th>
                <th>Bidang Pekerjaan</th>
              </tr>
            </tfoot>
            <tbody>
            @foreach($BidangPekerjaan as $bp)
              <tr>
                <td>
                    <form action="{{route('admin.bidang_pekerjaan.destroy',$bp->id)}}" method="post" class="d-inline">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger"><i class="far fa-fw fa-trash-alt"></i></button>
                    </form>
                
                <form action="{{route('admin.bidang_pekerjaan.update',$bp->id)}}" method="post" class="d-inline">
                        @csrf
                        @method('patch')
                    <button type="submit" class="btn btn-warning"><i class="far fa-fw far fa-edit"></i></button>
                </td>
                    <td>
                        <input class="form-control border-0" type="text" name="name" value="{{$bp->name}}">
                    </td>
                </form>
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