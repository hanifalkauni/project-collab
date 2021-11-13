<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Focus - Bootstrap Admin Dashboard </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('asset')}}/images/favicon.png">
    <link rel="stylesheet" href="{{asset('asset')}}/vendor/owl-carousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{asset('asset')}}/vendor/owl-carousel/css/owl.theme.default.min.css">
    <link href="{{asset('asset')}}/vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">
    <link href="{{asset('asset')}}/css/style.css" rel="stylesheet">



</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

@include('parsial.nav')
    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">



@include('parsial.sidebar')

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>@yield('judul')</h4>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    </div>
                </div>
                <!-- row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">@yield('Judul')</h4>
                            </div>
                            <div class="card-body">
                                @yield('konten')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a href="#" target="_blank">Quixkit</a> 2019</p>
                <p>Distributed by <a href="https://themewagon.com/" target="_blank">Themewagon</a></p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{asset('asset')}}/vendor/global/global.min.js"></script>
    <script src="{{asset('asset')}}/js/quixnav-init.js"></script>
    <script src="{{asset('asset')}}/js/custom.min.js"></script>


    <!-- Vectormap -->
    <script src="{{asset('asset')}}/vendor/raphael/raphael.min.js"></script>
    <script src="{{asset('asset')}}/vendor/morris/morris.min.js"></script>


    <script src="{{asset('asset')}}/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="{{asset('asset')}}/vendor/chart.js/Chart.bundle.min.js"></script>

    <script src="{{asset('asset')}}/vendor/gaugeJS/dist/gauge.min.js"></script>

    <!--  flot-chart js -->
    <script src="{{asset('asset')}}/vendor/flot/jquery.flot.js"></script>
    <script src="{{asset('asset')}}/vendor/flot/jquery.flot.resize.js"></script>

    <!-- Owl Carousel -->
    <script src="{{asset('asset')}}/vendor/owl-carousel/js/owl.carousel.min.js"></script>

    <!-- Counter Up -->
    <script src="{{asset('asset')}}/vendor/jqvmap/js/jquery.vmap.min.js"></script>
    <script src="{{asset('asset')}}/vendor/jqvmap/js/jquery.vmap.usa.js"></script>
    <script src="{{asset('asset')}}/vendor/jquery.counterup/jquery.counterup.min.js"></script>


    <script src="{{asset('asset')}}/js/dashboard/dashboard-1.js"></script>
    @stack('script')
</body>

</html>
