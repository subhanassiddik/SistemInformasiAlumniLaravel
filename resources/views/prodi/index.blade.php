@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-2">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Prodi</h6>
      </div>
    </div>

    <div class="card shadow mb-2">  
      <div class="card-body">
        <div class="row">
            <form class="form-inline" method="post" action="{{route('admin.prodi.store')}}">
                @csrf
                <div class="form-group mx-sm-3 mb-2">
                    <input name="prodi" type="text" class="form-control" placeholder="Nama Prodi">
                </div>
                <button type="submit" class="btn btn-primary mb-2">Tambah Prodi</button>
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
                <th>Nama Prodi</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>Action</th>
                <th>Nama Prodi</th>
              </tr>
            </tfoot>
            <tbody>
            @foreach($prodi as $p)
              <tr>
                <td>
                <form action="{{route('admin.prodi.destroy',$p->id)}}" method="post" class="d-inline">
					@csrf
					@method('delete')
					<button type="submit" class="btn btn-danger">Delete</button>
                </form>
                <button type="button" class="btn btn-warning" data-id="{{$p->id}}" data-prodi="{{$p->prodi}}" data-toggle="modal" data-target="#edit">
                    Edit
                </button>

                </td>
                <td>{{$p->prodi}}</td>
              </tr>
            @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>

    </div>
    <!-- /.container-fluid -->

    <!-- Modal -->
    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Prodi</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <form action="{{route('admin.prodi.update','test')}}" method="post">
        @csrf
        @method('patch')
        <div class="modal-body">
            <div class="form-group">
                <input type="hidden" name="id" id="id" value="">
                <input type="text" class="form-control" name="prodi" id="prodi">
            </div>
        </div>

        <div class="modal-footer">
            <button type="submit" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </div>
        </form>
        </div>
    </div>
    </div>

@endsection

@push('script')

<script>
    $('#edit').on('show.bs.modal', function(event){        
        var button = $(event.relatedTarget)
        var title = button.data('prodi')
        var id = button.data('id')

        var modal = $(this)

        modal.find('.modal-body #prodi').val(title);
        modal.find('.modal-body #id').val(id);
    })
</script>

<script>
  $(document).ready(function() {
    $('#dataTable').DataTable();
  });
</script>
@endpush