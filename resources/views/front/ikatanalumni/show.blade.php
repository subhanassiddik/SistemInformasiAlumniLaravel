@extends('layouts.front')

@section('title')
<title>Berita Alumni - Show</title>
@endsection

@section('content')

                <!-- Begin Page Content -->
                <div class="container">
                    <!-- Content Row -->
                    <div class="row justify-content-center">

                        <div class="col-lg-8">
                            
                            <div class="card shadow mb-1">
                                <div class="card-body">
                                    <h4 class="card-title">{{$ika->judul}}</h4>
                                    <small>Diposting : {{$ika->created_at}}</small>
                                </div>
                            </div>

                            <div class="card shadow mb-1">
                                <div class="card-body">
                                    <p>{!!$ika->postingan!!}</p>
                                    <a rel="nofollow" href="{{route('front.ikatan_alumni.index')}}">kembali&rarr;</a>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

@endsection