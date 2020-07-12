@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-2">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Jurusan</h6>
      </div>
    </div>

    <div class="card shadow mb-2">  
      <div class="card-body">
        <div class="row">
            <form class="form-inline" method="post" action="{{route('admin.jurusan.store')}}">
                @csrf
                <div class="form-group mx-sm-3 mb-2">
                  <select name="prodi" class="custom-select mr-sm-2">
                      <option value="">Pilih Prodi</option>
                      @foreach ($prodi as $p)
                        <option value="{{$p->id}}">{{$p->prodi}}</option>
                      @endforeach
                  </select>  
                  <input name="jurusan" type="text" class="form-control" placeholder="Nama Jurusan">
                </div>
                @error('prodi')
                  <small class="form-text text-muted">{{$message}}</small>
                @enderror
                @error('jurusan')
                  <small class="form-text text-muted">{{$message}}</small>
                @enderror
                <button type="submit" class="btn btn-primary mb-2">Tambah jurusan</button>
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
                <th>Jurusan</th>
                <th>Prodi</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>Action</th>
                <th>Jurusan</th>
                <th>Prodi</th>
              </tr>
            </tfoot>
            <tbody>
            @foreach($jurusan as $j)
              <tr>
                <td>
                <form action="{{route('admin.jurusan.destroy',$j->id)}}" method="post" class="d-inline">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                
                <form action="{{route('admin.jurusan.update',$j->id)}}" method="post" class="d-inline">
                  @csrf
                  @method('patch')
                  <button type="submit" class="btn btn-warning">Update</button>
                </td>
                <td><input class="form-control border-0" type="text" name="jurusan" value="{{$j->jurusan}}"></td>
                <td> 
                  <select name="prodi_id" class="form-control border-0" required>
                    @foreach ($prodi as $p) 
                      <option value="{{ $p->id }}" {{ $p->id == $j->prodi_id ? 'selected':'' }}>{{ $p->prodi }}</option>
                    @endforeach
                  </select>
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
    $('#dataTable').DataTable();
  });
</script>
@endpush