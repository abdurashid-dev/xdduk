<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Bootstrap Color Picker -->
    {{--
    <link rel="stylesheet"
        href="{{asset('dashboard/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')}}">--}}
    {{-- Bootstrap icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('dashboard/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('dashboard/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet"
          href="{{asset('dashboard/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
    <!-- Tempusdominus Bootstrap 4 -->
    {{--
    <link rel="stylesheet"
        href="{{ asset('dashboard/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">--}}
<!-- Select2 -->
    {{--
    <link rel="stylesheet" href="{{ asset('dashboard/plugins/select2/css/select2.min.css')}}">--}}
    {{--
    <link rel="stylesheet" href="{{ asset('dashboard/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
    --}}
<!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('dashboard/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    {{--
    <link rel="stylesheet" href="{{ asset('dashboard/plugins/jqvmap/jqvmap.min.css') }}">--}}
<!-- SweetAlert2 -->
    {{--
    <link rel="stylesheet" href="{{ asset('dashboard/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
    --}}
<!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('dashboard/plugins/toastr/toastr.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dashboard/dist/css/adminlte.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('dashboard/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    {{--
    <link rel="stylesheet" href="{{ asset('dashboard/plugins/daterangepicker/daterangepicker.css') }}">--}}
    <link rel="stylesheet" href="{{ asset('dashboard/plugins/summernote/summernote-bs4.min.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('style')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Preloader -->
{{-- <div class="preloader flex-column justify-content-center align-items-center">--}}
{{-- <img class="animation__shake" src="{{asset('dashboard/dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo"
    height="60" width="60">--}}
{{-- </div>--}}

<!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Navbar Search -->

            <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-user mr-2"></i>
                    <span class="hidden-xs ">{{\Illuminate\Support\Facades\Auth::user()->name}}</span>
                    <i class="fas fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu" style="left: inherit; right: 0px;">
                    <li class="user-header bg-gray-light">
                        <img src="{{asset('defaultAvatar.png')}}" class="img-circle" alt="User Image">
                        <p>{{\Illuminate\Support\Facades\Auth::user()->name}}</p>
                    </li>
                    <li class="user-footer">
                        <div class="d-flex justify-content-between">
                            @if(\Illuminate\Support\Facades\Auth::user()->role !== 'user2')
                                <a class="btn btn-default btn-flat"
                                   href="{{(\Illuminate\Support\Facades\Auth::user()->role == 'user1')? route('admin.profile'):route('admin.profile.index')}}"><span
                                        class="fas fa-user-cog"></span> Profil</a>
                            @endif
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-default btn-flat"
                                        onclick="return confirm('Ishonchingiz komilmi?')">
                                    <i class="fas fa-sign-out-alt"></i>
                                    Logout
                                </button>
                            </form>
                        </div>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a class="brand-link">
            <img src="{{asset('/dashboard/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo"
                 class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light"> Dashboard</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{asset('defaultAvatar.png')}}" class="img-circle elevation-2"
                         alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">{{\Illuminate\Support\Facades\Auth::user()->name}}</a>
                </div>
            </div>
            @include('admin.menus')
        </div>
        <!-- /.sidebar -->
    </aside>

    <div class="content-wrapper h-auto">
        <!-- Main content -->
        <section class="content pt-3">
            <div class="container-fluid p-3">
                @yield('content')
            </div><!-- /.container-fluid -->
        </section>
    </div>
    <!-- /.content -->


    <footer class="main-footer">
        <strong>Copyright &copy; 2021-{{\Carbon\Carbon::now()->format('Y')}} <a
                href="https://t.me/abdurashid_coder">iSoft</a>.</strong>
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 0.0.1
        </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('dashboard/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('dashboard/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
{{-- color picker --}}
{{--<script src="{{asset('dashboard/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>--}}
<!-- ChartJS -->
{{--<script src="{{ asset('dashboard/plugins/chart.js/Chart.min.js') }}"></script>--}}
<!-- Sparkline -->
{{--<script src="{{ asset('dashboard/plugins/sparklines/sparkline.js') }}"></script>--}}
<!-- JQVMap -->
{{--<script src="{{ asset('dashboard/plugins/jqvmap/jquery.vmap.min.js') }}"></script>--}}
{{--<script src="{{ asset('dashboard/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>--}}
<!-- jQuery Knob Chart -->
{{--<script src="{{ asset('dashboard/plugins/jquery-knob/jquery.knob.min.js') }}"></script>--}}
<!-- daterangepicker -->
{{--<script src="{{ asset('dashboard/plugins/moment/moment.min.js') }}"></script>--}}
{{--<script src="{{ asset('dashboard/plugins/daterangepicker/daterangepicker.js') }}"></script>--}}
<!-- Tempusdominus Bootstrap 4 -->
{{--<script src="{{ asset('dashboard/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}">
</script>--}}
<!-- overlayScrollbars -->
<script src="{{ asset('dashboard/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dashboard/dist/js/adminlte.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dashboard/dist/js/demo.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{{--<script src="{{ asset('dashboard/plugins/select2/js/select2.full.min.js') }}"></script>--}}
{{--<script src="{{ asset('dashboard/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js') }}">
</script>--}}
<!-- SweetAlert2 -->
{{--<script src="{{ asset('dashboard/plugins/sweetalert2/sweetalert2.min.js') }}"></script>--}}
<!-- Toastr -->
<script src="{{ asset('dashboard/plugins/toastr/toastr.min.js') }}"></script>
{{--bootstrap scripts--}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<!-- DataTables  & Plugins -->
<script src="{{asset('dashboard/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('dashboard/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('dashboard/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('dashboard/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('dashboard/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('dashboard/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('dashboard/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('dashboard/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('dashboard/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('dashboard/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('dashboard/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('dashboard/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>

{{--<script src="{{ asset('dashboard/dist/js/pages/dashboard.js') }}"></script>--}}
@if(session()->has('message'))
    <script>
        toastr.success('{{ session('message') }}');
    </script>
@endif
@if(session()->has('inactive'))
    <script>
        toastr.warning('{{ session('inactive') }}');
    </script>
@endif
@if(session()->has('image_error'))
    <script>
        toastr.warning('{{ session('image_error') }}');
    </script>
@endif
@if(session()->has('optimize'))
    <script>
        toastr.warning('{{ session('optimize') }}');
    </script>
@endif
@yield('script')
</body>

</html>
