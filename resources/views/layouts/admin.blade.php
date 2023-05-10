<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard || RentCar</title>
    <!-- Bootstrap 5-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/summernote/summernote-bs4.min.css') }}">
    @yield('style')
    <link rel="stylesheet" href="{{ asset('DataTables/datatables.min.css') }}">
    <!-- Datepicker -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <style>
        .form-transaksi {
            display: inline-block;
        }
        .form-profile {
            border: none;
            border-bottom: 2px solid blue;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{ asset('assets/dist/img/car.png') }}" alt="Admin" height="225"
                width="225">
        </div>

        <!-- Navbar -->
        @include('layouts.includes.navbar')
        <!-- end navbar -->

        <!-- Main Sidebar Container -->
        @include('layouts/includes/sidebar')
        <!-- end main sidebar container -->

        <!-- Content Wrapper. Contains page content -->
        @include('sweetalert::alert')

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                @yield('content')
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <strong>Copyright &copy; 2022-2023 <a href="{{ route('home') }}">RentCar</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            Rental Mobil Bandung
        </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    @yield('script')
    <!-- jQuery -->
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    <!-- <script src="{{ asset('assets/plugins/chart.js/Chart.min.js') }}"></script> -->
    <script src="{{ asset('chartjs/chart.umd.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('assets/plugins/sparklines/sparkline.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('assets/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('assets/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('assets/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ asset('assets/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('assets/dist/js/adminlte.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('assets/dist/js/pages/dashboard.js') }}"></script>
    @yield('scripts')
    <script src="{{ asset('DataTables/datatables.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script type="text/javascript">
        $('.show_confirm').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                    title: `Are you sure you want to delete this record?`,
                    text: "If you delete this, it will be gone forever.",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    }
                });
        });
    </script>
    <script type="text/javascript">
        $('.show_confirm_mobil').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                    title: `Are you sure you want to delete this record?`,
                    text: "Jika dihapus data transaksi yang berhubungan dengan data ini akan ikut terhapus.",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    }
                });
        });
    </script>
    <script type="text/javascript">
        $('.show_batalkan').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                    title: `Batalkan`,
                    text: "Apakah Anda Yakin Ingin Membatalkan",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then(function(isConfirm) {
                    if (isConfirm) {
                        form.submit();
                    }
                })
        });
    </script>
    <script type="text/javascript">
        $('.show_selesai').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                    title: `Selesai`,
                    text: "Rental Mobil Selesai?",
                    icon: "info",
                    buttons: true,
                    dangerMode: true,
                })
                .then(function(isConfirm) {
                    if (isConfirm) {
                        form.submit();
                    }
                })
        });
    </script>

    <script type="text/javascript">
        $('.show_onrent').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                    title: `On Rent`,
                    text: "Mulai Perentalan Sekarang?",
                    icon: "info",
                    buttons: true,
                    dangerMode: true,
                })
                .then(function(isConfirm) {
                    if (isConfirm) {
                        form.submit();
                    }
                })
        });
    </script>

    <script type="text/javascript">
        $('.show_wallet1').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                    title: `Dibayar`,
                    text: "Pembayaran selesai?",
                    icon: "info",
                    buttons: true,
                    dangerMode: true,
                })
                .then(function(isConfirm) {
                    if (isConfirm) {
                        form.submit();
                    }
                })
        });
    </script>
    <script type="text/javascript">
        $('.show_cod1').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                    title: `Dibayar`,
                    text: "Pembayaran selesai?",
                    icon: "info",
                    buttons: true,
                    dangerMode: true,
                })
                .then(function(isConfirm) {
                    if (isConfirm) {
                        form.submit();
                    }
                })
        });
    </script>
    <script type="text/javascript">
        $('.show_transfer1').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                    title: `Dibayar`,
                    text: "Pembayaran selesai?",
                    icon: "info",
                    buttons: true,
                    dangerMode: true,
                })
                .then(function(isConfirm) {
                    if (isConfirm) {
                        form.submit();
                    }
                })
        });
    </script>


    <script type="text/javascript"
        src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-flash-1.6.1/b-html5-1.6.1/b-print-1.6.1/r-2.2.3/datatables.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <!-- Datepicker -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</body>

</html>
