
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
    <link href="{{ asset('css/Kanit200.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app_master.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery.signature.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery-ui.css') }}" rel="stylesheet">
    <link href="{{ asset('css/vichean.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/datepicker.css') }}">
    <link href="{{ asset('css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/buttons.dataTables.min.css') }}" rel="stylesheet">

    {{-- export datatable css --}}

    <!-- Script -->
    <script src="{{ mix('js/app.js') }}"></script>
    <script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('js/jquery.signature.js') }}"></script>
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datepicker-thai.js') }}"></script>
    <script src="{{ asset('js/locales/bootstrap-datepicker.th.js') }}"></script>
    <script src="{{ asset('js/locales/bootstrap-datepicker.th.js') }}"></script>
    <script src="{{ asset('js/jquery.ui.touch-punch.js') }}" defer></script>

    {{-- export datatable --}}
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('js/jszip.min.js') }}"></script>
    <script src="{{ asset('js/pdfmake.min.js') }}"></script>
    <script src="{{ asset('js/vfs_fonts.js') }}"></script>
    <script src="{{ asset('js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('js/buttons.print.min.js') }}"></script>
    {{-- <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="http://cdn.datatables.net/1.10.7/js/jquery.dataTables.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/gh/ashl1/datatables-rowsgroup@fbd569b8768155c7a9a62568e66a64115887d7d0/dataTables.rowsGroup.js"></script>

</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">

    @include('navbar.navbar')

    @include('sidebar.sidebar')

    @yield('content')

    @include('footer.footer')

    </div>
    <!-- ./wrapper -->

    <script>
        $(function(){
            $(".datepicker").datepicker({
                // language:'th-th',
                format:'dd/mm/yyyy',
                autoclose: true,
                todayHighlight: true
            }).datepicker("setDate", new Date());
        });
    </script>

</body>
</html>
