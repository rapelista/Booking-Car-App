<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta
            content="IE=edge"
            http-equiv="X-UA-Compatible"
        >
        <meta
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
            name="viewport"
        >
        <meta
            content=""
            name="description"
        >
        <meta
            content=""
            name="author"
        >

        <title>{{ config('app.name') }} - Dashboard</title>

        <!-- Custom fonts for this template-->
        <link
            href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}"
            rel="stylesheet"
            type="text/css"
        >
        <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet"
        >

        <link
            href="{{ asset('vendor/bootstrap-5.3.1/css/bootstrap.min.css') }}"
            rel="stylesheet"
        >

        <!-- Custom styles for this template-->
        <link
            href="{{ asset('css/sb-admin-2.min.css') }}"
            rel="stylesheet"
        >

        <link
            href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}"
            rel="stylesheet"
        >

    </head>

    <body
        class="sidebar-toggled"
        id="page-top"
    >

        <!-- Page Wrapper -->
        <div id="wrapper">

            <x-sidebar />

            <!-- Content Wrapper -->
            <div
                class="d-flex flex-column"
                id="content-wrapper"
            >

                <!-- Main Content -->
                <div id="content">

                    <x-topbar />

                    <!-- Begin Page Content -->
                    <div class="container-fluid">


                        <!-- Bootstrap core JavaScript-->
                        <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
                        <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

                        <!-- Core plugin JavaScript-->
                        <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

                        <!-- Custom scripts for all pages-->
                        <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

                        <!-- Page level plugins -->
                        <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>
                        <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
                        <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
                        <script src="{{ asset('vendor/bootstrap-5.3.1/js/bootstrap.bundle.min.js') }}"></script>

                        @yield('content')

                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; {{ config('app.name') }} 2021</span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a
            class="scroll-to-top rounded"
            href="#page-top"
        >
            <i class="fas fa-angle-up"></i>
        </a>

        <x-modal.logout />

        <!-- Page level custom scripts -->
        {{-- <script src="{{ asset('js/demo/chart-area-demo.js') }}"></script> --}}
        {{-- <script src="{{ asset('js/demo/chart-pie-demo.js') }}"></script> --}}
    </body>

</html>
