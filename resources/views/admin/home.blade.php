@extends('layouts.admin')

@section('title')
<title>Admin - Dashboard</title>
@endsection

@section('content')
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Pending Requests Card Example -->
            <div class="col-xl-4 col-md-4 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">jumlah alumni</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{$total}}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-fw fas fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-md-4 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">alumni (bekerja)</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{$bekerja}}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-fw fas fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-md-4 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">alumni (belum bekerja)</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{$belumbekerja}}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-fw fas fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>       
        </div>
        <!-- /.container-fluid -->

@endsection
