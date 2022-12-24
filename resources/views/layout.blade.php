<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Hyper - Responsive Bootstrap 4 Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

    <!-- third party css -->
    <link href="{{ asset('assets/css/vendor/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet" type="text/css" />
    <!-- third party css end -->
    <link href="{{ asset('assets/css/vendor/dataTables.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/vendor/responsive.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/vendor/buttons.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/vendor/select.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
    <!-- App css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/app-creative.min.css') }}" rel="stylesheet" type="text/css" id="light-style" />
    <link href="{{ asset('assets/css/app-creative-dark.min.css') }}" rel="stylesheet" type="text/css" id="dark-style" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <!-- Datatables css -->

    @yield('css')

</head>

<body class="loading"
    data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
    <!-- Begin page -->
      <!-- Pre-loader -->
      <div id="preloader">
        <div id="status">
            <div class="bouncing-loader"><div ></div><div ></div><div ></div></div>
        </div>
    </div>
    <!-- End Preloader-->
    <div class="wrapper">
        @include('layout.header')


        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">
                @include('layout.menu')
                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->

                    <!-- end page title -->
                    @yield('content')

                    <!-- end row -->


                </div>
                <!-- container -->

            </div>
            <!-- content -->
            @include('layout.footer')

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->


    </div>
    <!-- END wrapper -->

    <!-- Right Sidebar -->
    <div class="right-bar">

        <div class="rightbar-title">
            <a href="javascript:void(0);" class="right-bar-toggle float-right">
                <i class="dripicons-cross noti-icon"></i>
            </a>
            <h5 class="m-0">Settings</h5>
        </div>

        <div class="rightbar-content h-100" data-simplebar>

            <div class="p-3">
                <div class="alert alert-warning" role="alert">
                    <strong>Customize </strong> the overall color scheme, layout width, etc.
                </div>

                <!-- Settings -->
                <h5 class="mt-3">Color Scheme</h5>
                <hr class="mt-1" />

                <div class="custom-control custom-switch mb-1">
                    <input type="radio" class="custom-control-input" name="color-scheme-mode" value="light"
                        id="light-mode-check" checked />
                    <label class="custom-control-label" for="light-mode-check">Light Mode</label>
                </div>

                <div class="custom-control custom-switch mb-1">
                    <input type="radio" class="custom-control-input" name="color-scheme-mode" value="dark"
                        id="dark-mode-check" />
                    <label class="custom-control-label" for="dark-mode-check">Dark Mode</label>
                </div>

                <!-- Width -->
                <h5 class="mt-4">Width</h5>
                <hr class="mt-1" />
                <div class="custom-control custom-switch mb-1">
                    <input type="radio" class="custom-control-input" name="width" value="fluid" id="fluid-check"
                        checked />
                    <label class="custom-control-label" for="fluid-check">Fluid</label>
                </div>
                <div class="custom-control custom-switch mb-1">
                    <input type="radio" class="custom-control-input" name="width" value="boxed" id="boxed-check" />
                    <label class="custom-control-label" for="boxed-check">Boxed</label>
                </div>



                <button class="btn btn-primary btn-block mt-4" id="resetBtn">Reset to Default</button>

                <a href="https://themes.getbootstrap.com/product/hyper-responsive-admin-dashboard-template/"
                    class="btn btn-danger btn-block mt-3" target="_blank"><i class="mdi mdi-basket mr-1"></i> Purchase
                    Now</a>
            </div> <!-- end padding-->

        </div>
    </div>

    <div class="rightbar-overlay"></div>
    <!-- /Right-bar -->

    <!-- bundle -->
    <script src="{{ asset('assets/js/vendor.min.js') }}"></script>
    <script src="{{ asset('assets/js/app.min.js') }}"></script>
   <!-- Datatables js -->
   <script src="{{ asset('assets/js/vendor/jquery.dataTables.min.js') }}"></script>
   <script src="{{ asset('assets/js/vendor/dataTables.bootstrap4.js') }}"></script>
   <script src="{{ asset('assets/js/vendor/dataTables.responsive.min.js') }}"></script>
   <script src="{{ asset('assets/js/vendor/responsive.bootstrap4.min.js') }}"></script>
   <script src="{{ asset('assets/js/vendor/dataTables.buttons.min.js ') }}"></script>
   <script src="{{ asset('assets/js/vendor/buttons.bootstrap4.min.js ') }}"></script>
   <script src="{{ asset('assets/js/vendor/buttons.html5.min.js ') }}"></script>
   <script src="{{ asset('assets/js/vendor/buttons.flash.min.js ') }}"></script>
   <script src="{{ asset('assets/js/vendor/buttons.print.min.js ') }}"></script>
   <script src="{{ asset('assets/js/vendor/dataTables.select.min.js') }}"></script>
   <script src="{{ asset('assets/js/vendor/dataTables.keyTable.min.js') }}"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js" ></script>
   <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
   <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   <script src="{{ asset('js/jquery.controller.js') }}"></script>
    <!-- third party js -->
    <script src="{{ asset('assets/js/vendor/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/jquery-jvectormap-1.2.2.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/jquery-jvectormap-world-mill-en.js') }}"></script>

    <!-- third party js ends -->
    {{-- <script src="{{ asset('assets/js/pages/demo.datatable-init.js') }}"></script> --}}

    <!-- demo app -->
    <!-- end demo js-->
    @yield('js')
</body>

</html>
