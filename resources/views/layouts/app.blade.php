<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Weedtracking') }}</title>

    <!-- Fonts -->

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/line-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/themify-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.min.css') }}" rel="stylesheet">

    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/metisMenu.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/flickity.css') }}" rel="stylesheet">

    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    @yield('css')


    <link href="{{ asset('css/main.css') }}" rel="stylesheet" defer>
</head>
<body class="fixed-navbar has-animation sidebar-mini">

    <div id="app" class="page-wrapper">
      @include('layouts.header')
      @include('layouts.sidebar')
      <div class="content-wrapper">
          <!-- START PAGE CONTENT-->
          @yield('page-header')
          <div class="page-content ">
          @yield('content')
          </div>
          <footer class="page-footer">
            <div class="float" style="display: block;">@yield('fab')</div>
          </footer>
      </div>

    </div>
    <!-- BEGIN PAGA BACKDROPS-->
    <div class="sidenav-backdrop backdrop"></div>
    <div class="preloader-backdrop">
        <div class="page-preloader">Loading</div>
    </div>
    <!-- END PAGA BACKDROPS-->

    <!-- BEGIN ALERTS-->

    <!-- END ALERTS-->

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" ></script>

    {{-- <script src="{{ asset('js/moment.min.js') }}" defer></script> --}}
    <script src="{{ asset('js/metisMenu.min.js') }}" defer></script>
    {{-- <script src="{{ asset('js/dropzone.js') }}" defer></script> --}}




    @yield('script')
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
    {{-- alertas --}}


    <script src="{{ asset('js/template.js') }}" defer></script>
    @include('layouts.alert')

</body>
</html>
