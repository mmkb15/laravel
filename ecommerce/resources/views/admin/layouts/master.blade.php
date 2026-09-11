<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<!--<![endif]-->

<head>
    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <title>@yield('title')</title>

    <meta name="author" content="themesflat.com">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Theme Style -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/animate.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/animation.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap-select.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">



    <!-- Font -->
    <link rel="stylesheet" href="{{asset('assets/font/fonts.css')}}">

    <!-- Icon -->
    <link rel="stylesheet" href="{{asset('assets/icon/style.css')}}">

    <!-- Favicon and Touch Icons  -->
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{asset('assets/images/favicon.png')}}">
    @yield('link')
    @yield('style')

</head>

<body class="body">

    <!-- #wrapper -->
    <div id="wrapper">
        <!-- #page -->
        <div id="page" class="">
            <!-- layout-wrap -->
           <div class="layout-wrap">
                <!-- preload -->
                <!-- <div id="preload" class="preload-container">
                    <div class="preloading">
                        <span></span>
                    </div>
                </div> -->
                <!-- /preload -->
                <!-- section-menu-left -->
                @include('admin.layouts.sidebar')
                <!-- /section-menu-left -->
                <!-- section-content-right -->
                <div class="section-content-right">
                    <!-- header-dashboard -->
                    @include('admin.layouts.header')
                    <!-- /header-dashboard -->
                    <!-- main-content -->
                    <div class="main-content">
                        <!-- main-content-wrap -->
                        <div class="main-content-inner">
                            <!-- main-content-wrap -->
                            @yield('content')
                            <!-- /main-content-wrap -->
                        </div>
                        <!-- /main-content-wrap -->
                        <!-- bottom-page -->
                        @include('admin.layouts.footer')
                        <!-- /bottom-page -->
                    </div>
                    <!-- /main-content -->
                </div>
                <!-- /section-content-right -->
            </div>
            <!-- /layout-wrap -->
        </div>
        <!-- /#page -->
    </div>
    <!-- /#wrapper -->

    <!-- Javascript -->
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap-select.min.js')}}"></script>
    <script src="{{asset('assets/js/zoom.js')}}"></script>
    <script src="{{asset('assets/js/apexcharts/apexcharts.js')}}"></script>
    <script src="{{asset('assets/js/apexcharts/line-chart-1.js')}}"></script>
    <script src="{{asset('assets/js/apexcharts/line-chart-2.js')}}"></script>
    <script src="{{asset('assets/js/apexcharts/line-chart-3.js')}}"></script>
    <script src="{{asset('assets/js/apexcharts/line-chart-4.js')}}"></script>
    <script src="{{asset('assets/js/apexcharts/line-chart-5.js')}}"></script>
    <script src="{{asset('assets/js/apexcharts/line-chart-6.js')}}"></script>
    <!-- <script src="js/switcher.js"></script> -->
    <script src="{{asset('assets/js/theme-settings.js')}}"></script>
    <script src="{{asset('assets/js/main.js')}}"></script>

    @yield('script')
</body>

</html>