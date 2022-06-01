<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>@yield('title', 'Laravel Role Admin')</title>
    @include('backend.layouts.partials.styles')
    @yield('styles')
</head>

<body class="fixed-navbar">
    <div class="page-wrapper">
        <!-- START HEADER-->
        @include('backend.layouts.partials.header')
        <!-- END HEADER-->
        <!-- START SIDEBAR-->
        @include('backend.layouts.partials.sidebar')
        <!-- END SIDEBAR-->
        <div class="content-wrapper">
            <!-- START PAGE CONTENT-->
            @yield('admin-content')
            <!-- END PAGE CONTENT-->
            @include('backend.layouts.partials.footer')
        </div>
    </div>
    <!-- BEGIN THEME CONFIG PANEL-->
    {{--@include('backend.layouts.partials.configpanel')--}}
    <!-- END THEME CONFIG PANEL-->
    <!-- BEGIN PAGA BACKDROPS-->
    <div class="sidenav-backdrop backdrop"></div>
    <div class="preloader-backdrop">
        <div class="page-preloader">Loading</div>
    </div>
    <!-- END PAGA BACKDROPS-->
    @include('backend.layouts.partials.scripts')
    @yield('scripts')
</body>

</html>
