@extends('layouts.admin')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"> <i class="fa fa-fw fa-plus"></i> Biodata Mahasiswa</h1>

    <div class="row">

        <div class="col-lg-6">

            <!-- Circle Buttons -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"></h6>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <img src="{{asset('/file_alumni_profil/'.$alumni->photo)}}" class="img-thumbnail" width="200px" alt="...">
                    </div>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">{{$alumni->name}}</li>
                    <li class="list-group-item">{{$alumni->nim}}</li>
                    <li class="list-group-item">{{$alumni->telepon}}</li>
                    <li class="list-group-item">{{$alumni->email}}</li>
                    <li class="list-group-item">{{$alumni->alamat}}</li>
                    <li class="list-group-item">{{$alumni->tugas_akhir}}</li>
                    <li class="list-group-item">{{$alumni->jurusan->jurusan}}</li>
                    <li class="list-group-item">{{$alumni->angkatan}}</li>
                    <li class="list-group-item">{{$alumni->ipk}}</li>
                    <li class="list-group-item">{{$alumni->tahun_lulus}}</li>
                    <li class="list-group-item">{{$alumni->pekerjaan->name}}</li>
                    <li class="list-group-item">{{$alumni->posisi}}</li>
                    <li class="list-group-item">{{$alumni->tanggung_jawab_khusus}}</li>
                </ul>
            </div>

        </div>

    </div>

</div>
<!-- /.container-fluid -->



@endsection
