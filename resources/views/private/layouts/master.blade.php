<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Private | @yield('title')</title>

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="{{ asset('private/plugins/fontawesome-free/css/all.min.css') }}">
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="{{ asset('private/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('private/dist/css/adminlte.min.css') }}">
        @yield('css')
        @yield('script')
    </head>

    <body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
        <div class="wrapper">

            <!-- Preloader -->
            @include('private.layouts._includes._Preloader')

            <!-- Navbar -->
            @include('private.layouts._includes._Navbar')

            <!-- Main Sidebar Container -->
            @include('private.layouts._includes._Sidebar')

            <!-- Content Wrapper. Contains page content -->
            @yield('content')
            <!-- /.content-wrapper -->

            <!-- Control Sidebar -->
            @include('private.layouts._includes._ControlSidebar')
            <!-- /.control-sidebar -->

            <!-- Main Footer -->
            @include('private.layouts._includes._Footer')
        </div>
        <!-- ./wrapper -->

        @yield('modal')

        <!-- REQUIRED SCRIPTS -->
        <!-- jQuery -->
        <script src="{{ asset('private/plugins/jquery/jquery.min.js') }}"></script>
        <!-- Bootstrap -->
        <script src="{{ asset('private/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <!-- overlayScrollbars -->
        <script src="{{ asset('private/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('private/dist/js/adminlte.js') }}"></script>

        <!-- PAGE PLUGINS -->
        <!-- jQuery Mapael -->
        <script src="{{ asset('private/plugins/jquery-mousewheel/jquery.mousewheel.js') }}"></script>
        <script src="{{ asset('private/plugins/raphael/raphael.min.js') }}"></script>
        <script src="{{ asset('private/plugins/jquery-mapael/jquery.mapael.min.js') }}"></script>
        <script src="{{ asset('private/plugins/jquery-mapael/maps/usa_states.min.js') }}"></script>
        <!-- ChartJS -->
        <script src="{{ asset('private/plugins/chart.js/Chart.min.js') }}"></script>

        <!-- AdminLTE for demo purposes -->
        <script src="{{ asset('private/dist/js/demo.js') }}"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="{{ asset('private/dist/js/pages/dashboard2.js') }}"></script>

        {{-- sweet alert --}}
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </body>

</html>
