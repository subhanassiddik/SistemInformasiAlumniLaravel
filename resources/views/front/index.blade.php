@extends('layouts.front')

@section('title')
<title>Alumni Polinas</title>
@endsection

@section('content')

        <!-- Begin Page Content -->
        <div class="container">
          <!-- Content Row -->
          <div class="row">

            <div class="col-lg-8 mb-1">

              <!-- Illustrations -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Illustrations</h6>
                </div>
                <div class="card-body">
                  <div class="text-center">
                    <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                      src="{{asset('sbadmin/img/logotext.png')}}" alt="">
                  </div>
                  <p>Hola, Selamat datang di website informasi alumni <a target="_blank" rel="nofollow"
                      href="https://www.polinas.ac.id/">Politeknik Infomatika Nasional Makassar.</a> Jika anda adalah alumni, silahkan login untuk melengkapi data anda.</p>
                  <a target="_blank" rel="nofollow" href="{{route('front.alumni.index')}}">Halaman Daftar Alumni &rarr;</a>
                </div>
              </div>

              <!-- Project Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-fw fa-chart-area"></i>Data Alumni
                    Bekerja
                  </h6>
                </div>
                <div class="card-body">
                  <h4 class="small font-weight-bold">Bekerja <span class="float-right">{{$kerja}}%</span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar bg-danger" role="progressbar" style="width:{{$kerja}}%" aria-valuenow="20"
                      aria-valuemin="0" aria-valuemax="{{$total}}"></div>
                  </div>
                  <h4 class="small font-weight-bold">Tidak Bekerja <span class="float-right">{{$belumkerja}}%</span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: {{$belumkerja}}%" aria-valuenow="40"
                      aria-valuemin="0" aria-valuemax="{{$total}}"></div>
                  </div>
                </div>
              </div>

            </div>

            <div class="col-lg-4 mb-4">
              <!-- Illustrations -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Login Mahasiswa</h6>
                </div>
                <div class="card-body">
                @if (session('perhatian'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>{{ session('perhatian')}}</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                @endif
                
                @if(!Auth::check())
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <p>Silahkan login menggunakan alamat email yang telah terdaftar di polinas, password default adalah nim anda.</p>
                  <strong>Ubah Password Default Anda!!!</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                @endif

                  <form action=" {{ route('login') }}" method="POST">
                    @csrf
                    
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email address</label>
                      <input type="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1" name="email" value="{{ old('email') }}"
                        placeholder="Enter email">
                        @error('email')
                          <small class="form-text text-muted">{{$message}}</small>  
                        @enderror  
                    </div>
                    
                    <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword1" placeholder="Password">
                      @error('password')
                          <small class="form-text text-muted">{{$message}}</small>  
                      @enderror
                    </div>
                    <div class="form-check mb-3">
                      <input class="form-check-input" type="checkbox" name="remember" id="exampleCheck1" {{ old('remember') ? 'checked' : '' }}>
                      <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Submit</button>
                    @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                  
                  </form>
                </div>
              </div>

            </div>

          </div>

        </div>
        <!-- /.container-fluid -->

@endsection