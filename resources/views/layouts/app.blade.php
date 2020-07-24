<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Handesk') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/all.css') }}" rel="stylesheet">
    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{  asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Other Style CSS -->
    @yield('custom_css')

</head>

<body data-sidebar="dark">
    <div id="app">

        <!-- Begin page -->
        <div id="layout-wrapper">

            {{--        @include('layouts.header')--}}
            @include('layouts.tinyHeader')
            @include('layouts.sidebar')

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="row">

                        <div class="container-fluid">

                            <!-- start page title -->
                            {{-- <div class="row">
                                    <div class="col-12">
                                        <div class="page-title-box d-flex align-items-center justify-content-between">
                                            <h4 class="mb-0 font-size-18">Starter Page</h4>
        
                                            <div class="page-title-right">
                                                <ol class="breadcrumb m-0">
                                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Utility</a></li>
                                                    <li class="breadcrumb-item active">Starter Page</li>
                                                </ol>
                                            </div>
        
                                        </div>
                                    </div>
                                </div> --}}
                            <!-- end page title -->
                            @yield('content')
                        </div> <!-- container-fluid -->
                    </div>

                </div>
                <!-- End Page-content -->


                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <script>
                                    document.write(new Date().getFullYear())
                                </script> ©
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->



    </div>

    <!-- Scripts -->
    <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>

    <script src="{{ asset('assets/js/app.js') }}"></script>

    <script src="{{ asset('js/app.js') }}"></script>
    @yield('scripts')
    @stack('edit-scripts')

</body>

</html>