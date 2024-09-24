<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Custom fonts for this template-->
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    @vite("resources/css/sb-admin-2.min.css")
    @vite("resources/vendor/fontawesome-free/css/all.min.css")
</head>
<body id="page-top">
<!-- Page Wrapper -->
<div id="wrapper">
    @include('admin.include.side-bar')
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
        {{ $slot }}
    </div>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
</div>
<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="{{route('auth.admin.logout')}}">Logout</a>
            </div>
        </div>
    </div>
</div>
<!-- Bootstrap core JavaScript-->
@vite("resources/vendor/jquery/jquery.min.js")
@vite("resources/vendor/bootstrap/js/bootstrap.bundle.min.js")
@vite("resources/vendor/jquery-easing/jquery.easing.min.js")
@vite("resources/js/sb-admin-2.min.js")
@vite("resources/vendor/chart.js/Chart.min.js")
@vite("resources/js/demo/chart-area-demo.js")
@vite("resources/js/demo/chart-pie-demo.js")
</body>
</html>
