
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>

    <style>
        .table.dataTable{
        width: 100% !important;
        }

        .brand-link .brand-image{
            margin-left: .25rem !important;
        }

        body{
          font-family: 'Kanit', sans-serif !important;
        }
    </style>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <link rel="icon" href="{{ asset('storage/images/WCLogo.ico') }}" type="image/icon type">
    <title>VICHIAN TRANSPORT LIMITED PARTNERSHIP</title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@200&amp;display=swap" rel="stylesheet">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    {{-- <link type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-street/jquery-ui.css" rel="stylesheet"> --}}

    <!-- REQUIRED SCRIPTS -->
    <script src="{{ mix('js/app.js') }}"></script>
    <script src="{{ mix('js/jquery-3.5.1.min.js') }}"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script> --}}

</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">

    @include('navbar.navbar')

    @include('sidebar.sidebar')

    @yield('content')

    @include('footer.footer')

    </div>
    <!-- ./wrapper -->

</body>
</html>
