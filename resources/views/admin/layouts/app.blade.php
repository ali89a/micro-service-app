<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="PIXINVENT">
    <title>@yield('title') | {{ env('APP_NAME','Parcelsheba') }}</title>
    <link rel="icon" type="image/x-icon" href="{{asset('admin/app-assets/images/ico/favicon.ico')}}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset(mix('css/admin.css')) }}">
    @stack('style')
</head>

<body class="vertical-layout vertical-menu-modern footer-static menu-expanded pace-done navbar-sticky" data-open="click" data-menu="vertical-menu-modern" data-col="">
    @include('admin.partials.topbar')
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto">
                    <a class="navbar-brand" href="{{route('admin.dashboard')}}">
                        <span class="brand-logo"><img style="margin-left: 7px;" src="{{ asset('admin/app-assets/images/ico/favicon.ico') }}"></span>
                        <h4 class="ml-1 text-primary">Micro<br></h4>
                    </a>
                </li>
                <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i></a></li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            @include('admin.partials.sidebar')
        </div>
    </div>

    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        @yield('content')
    </div>


    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <footer class="footer footer-static footer-light">
        <p class="clearfix mb-0"><span class="float-md-left d-block d-md-inline-block mt-25">COPYRIGHT &copy; <?php echo date("Y"); ?><a class="ml-25" href="#" target="_blank">Company Name</a><span class="d-none d-sm-inline-block"> All rights Reserved</span></span><span class="float-md-right d-none d-md-block">Version 0.0.1<i data-feather="heart"></i></span></p>
    </footer>
    <button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>

    <script src="{{ asset(mix('js/admin.js')) }}"></script>
    <script src="https://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    <script src="{{asset('admin/app-assets/vendors/js/extensions/sweetalert2.all.min.js')}}"></script>
    {!! Toastr::message() !!}
    @include('admin.partials.message')
    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>
    @stack('script')
    <script>
        //sweetalert 2
        $(document).ready(function() {
            // layout theme change
            $(document).on('click', '.confirm-text', function(event) {
                var form = $(this).closest("form");
                // var name = $(this).data("name");
                event.preventDefault();
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it!',
                    customClass: {
                        confirmButton: 'btn btn-primary',
                        cancelButton: 'btn btn-outline-danger ml-1'
                    },
                    buttonsStyling: false
                }).then(function(result) {
                    if (result.value) {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    }
                });
            });
        })
    </script>
</body>
<!-- END: Body-->

</html>