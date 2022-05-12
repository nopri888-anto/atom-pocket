<!DOCTYPE html>
<html lang="en">
@include('layouts.header')

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        @include('layouts.sidebar')

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                @include('layouts.navbar')

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    @yield('content')
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            @include('layouts.footer')
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    @include('layouts.modal')

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('/')}}vendor/jquery/jquery.min.js"></script>
    <script src="{{asset('/')}}vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('/')}}vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('/')}}js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="{{asset('/')}}vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="{{asset('/')}}vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('/')}}vendor/js/demo/datatables-demo.js"></script>

</body>

</html>