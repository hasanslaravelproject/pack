<!DOCTYPE html>
<html lang="en">


<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Multikart admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Multikart admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    @include ('backend.content.header')
    @include('backend.content.css')
    </head>
    <body>
    <!-- page-wrapper Start-->
    <div class="page-wrapper">

        <!-- Page Header Start-->
        <div class="page-main-header">
            <div class="main-header-right row">
                <div class="main-header-left d-lg-none">
                    <div class="logo-wrapper"><a href="index.html"><img class="blur-up lazyloaded" src="{{asset('assets/images/dashboard/multikart-logo.png')}}" alt=""></a></div>
                </div>
                <div class="mobile-sidebar">
                    <div class="media-body text-right switch-sm">
                        <label class="switch"><a href="#"><i id="sidebar-toggle" data-feather="align-left"></i></a></label>
                    </div>
                </div>
                @include('backend.content.sidebar')
                @yield('maincontent')
                @include('backend.content.footer')

            </div>

    @include('backend.content.js')

    </body>

</html>


