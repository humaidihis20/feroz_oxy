<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Feroz Oxy</title>
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/images/Feroz-Oxy.png') }}">

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{ asset('modules/jqvmap/dist/jqvmap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }} ">
  {{-- <link rel="stylesheet" href="{{ asset('modules/summernote/dist/summernote-bs4.css') }}"> --}}
  {{-- <link rel="stylesheet" href="{{ asset('modules/owl.carousel/dist/assets/owl.carousel.min.css') }}">
  <link rel="stylesheet" href="{{ asset('modules/owl.carousel/dist/assets/owl.theme.default.min.css') }}"> --}}
  <link rel="stylesheet" href="{{ asset('modules/datatables/datatables.min.css') }} ">
  <link rel="stylesheet" href="{{ asset('modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }} ">
  <link rel="stylesheet" href="{{ asset('modules/chocolat/dist/css/chocolat.css') }} ">
  
  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">
  <link rel="stylesheet" href="{{ asset('css/preloads.css') }}">

  {{-- Trix Editor --}}
  <link rel="stylesheet" type="text/css" href="{{ asset('css/trix.css') }}">
  <script type="text/javascript" src="{{ asset('js/trix.js') }}"></script>
  
  {{-- <script src="{{ asset('modules/jquery.min.js') }}"></script> --}}
  <script src="{{ asset('modules/popper.js') }}"></script>
  <script src="{{ asset('modules/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('modules/sweetalert/sweetalert.min.js') }} "></script>
  {{-- <script src="{{ asset('js/sweetalert2.min.js') }} "></script> --}}
  {{-- <script src="{{ asset('js/wizard.js') }} "></script> --}}

  <style>
    trix-toolbar [data-trix-button-group="file-tools"] {
      display: none;
    }
  </style>
</head>

<body>
  <div id="app">
   
    <div class="main-wrapper">
      <div class="navbar-bg"></div>

      @include('layouts_admin.navbar')

      <div class="main-sidebar">

        @include('layouts_admin.sidebar')

      </div>

      @yield('content')

      @include('layouts_admin.footer')
    </div>
  </div>

  @include('layouts_admin.script')
</body>
</html>
