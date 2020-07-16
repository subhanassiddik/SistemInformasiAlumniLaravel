<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - 404</title>

  <!-- Custom fonts for this template-->
  <link href="{{asset('sbadmin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{asset('sbadmin/css/sb-admin-2.min.css')}}" rel="stylesheet">

  
  @include('alumni.module.style')
  
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        @include('alumni.module.topbar')

        @yield('content')

      </div>
      <!-- End of Main Content -->

    @include('alumni.module.footer')
    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Bootstrap core JavaScript-->
  <script src="{{asset('sbadmin/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('sbadmin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{asset('sbadmin/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{asset('sbadmin/js/sb-admin-2.min.js')}}"></script>

  <!-- Page level plugins -->
  <script src="{{asset('sbadmin/vendor/chart.js/Chart.min.js')}}"></script>

</body>

</html>