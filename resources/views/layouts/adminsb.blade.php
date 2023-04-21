<!DOCTYPE html>
<html lang="fr">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Trs Chila - Admininstration</title>

  <!-- Custom fonts for this template-->
  <link href="{{asset('js/admin/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  
  
  <link href="{{asset('css/adminsb.css')}}" rel="stylesheet">
  <link rel="stylesheet" href=" {{asset('css/stylesb.css')}}">
  <link href="{{asset('js/admin/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

</head>

<body id="page-top">
      @if ((new \Jenssegers\Agent\Agent())->isMobile())
      <div class="w-100 vh-100 text-center" style="background-color: teal; z-index:2;"> 
        <p class="" style="color: black; font-size:3em;">L'administration du site n'est fonctionnel que sur Pc</p>
        <div class="dropdown-divider mb-3"></div>
        <a class="justify-content-center" style="font-size:2em; color:black;" href="{{ route('logout') }}"
        onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
         {{ __('Déconnexion') }}
     </a>

     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
         @csrf
     </form>
      </div>
      </div>
      @else
  <!-- Page Wrapper -->
  <div id="wrapper">

    @include('admin.partials.sidenav')

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

          @include('admin.partials.topbar')

          <div class="container-fluid">
            @yield('content')
              @include('sweetalert::alert')
          </div>
      </div>
      <!-- End of Main Content -->



    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->
      @endif


  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>


  <!-- Bootstrap core JavaScript-->
  <script src="{{asset('js/admin/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('js/admin/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{asset('js/admin/jquery-easing/jquery.easing.min.js')}}"></script>



  <!-- Page level plugins -->
  <script src="{{asset('js/admin/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('js/admin/datatables/dataTables.bootstrap4.min.js')}}"></script>
  
  <!-- Custom scripts for all pages-->
  <script src="{{asset('js/admin/adminsb.js')}}"></script>

  {{-- <script src="{{asset('js/admin/chart.js/Chart.min.js')}}"></script>
 --}}
  <!-- Page level custom scripts -->
{{--   <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script> --}}

</body>
</html>
