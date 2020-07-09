@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Daftar Alumni</h6>
  </div>
</div>
<div class="card shadow mb-4">  
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Name</th>
            <th>Position</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>Name</th>
            <th>Position</th>
          </tr>
        </tfoot>
        <tbody>
        @foreach($alumni as $al)
          <tr>
            <td>{{$al->name}}</td>
            <td>{{$al->email}}</td>
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