@extends('layouts.front')

@section('title')
<title>Berita Alumni</title>
@endsection

@section('content')

                <!-- Begin Page Content -->
                <div class="container">
                    <!-- Content Row -->
                    <div class="row">

                        <div class="col-lg-12 mb-4">

                            <!-- Illustrations -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-fw fa-newspaper"></i>Berita Alumni</h6>
                                </div>
                            </div>
                            
                            @foreach($ika as $ik)
                            <div class="card shadow mb-1">
                                <div class="card-body">
                                    <h5 class="card-title">{{$ik->judul}}</h5>
                                    
                                    <p>Di Posting : {{$ik->created_at}}</p>
                                    <a  rel="nofollow" href="{{route('front.ikatan_alumni.show',$ik->id)}}">Lihat Selengkapnya &rarr;</a>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                    {{ $ika->links() }}

                </div>
                <!-- /.container-fluid -->

@endsection