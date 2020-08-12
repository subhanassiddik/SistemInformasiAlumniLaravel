<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
    <div class="container">
        <a class="navbar-brand" href="{{route('front.index')}}">
            <img src="{{asset('sbadmin/img/logo.png')}}" width="35" height="30" class="d-inline-block align-top" alt="">
            Alumni Polinas
        </a>
        <ul class="navbar-nav mr-auto">
            <li class="nav-item ">
                <a class="nav-link" href="{{route('front.ikatan_alumni.index')}}"><i class="fas fa-fw fa-newspaper"></i>  Berita Alumni <span
                        class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="{{route('front.grafik.index')}}"> <i class="fas fa-fw fa-chart-area"></i>
                    Grafik Alumni <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="{{route('front.alumni.index')}}"><i class="fas fa-fw fas fa-users	"></i>Daftar Alumni <span
                        class="sr-only">(current)</span></a>
            </li>
        </ul>

        @if(Auth::check())

        <ul class="navbar-nav ml-auto">

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{Auth::user()->name}}</span>
                    <img class="img-profile rounded-circle" src="{{asset('/file_alumni_profil/'.Auth::user()->photo)}}">
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="{{route('alumni.home')}}">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        Profile
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('user.logout') }}" data-toggle="modal"
                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('user.logout') }}" method="GET" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>

        </ul>
        @endif

    </div>
</nav>



