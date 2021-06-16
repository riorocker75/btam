<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ Session::token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Riwayat Pendanaan</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="{{asset('asset/css/adminlte.css')}}">


    
     <link rel="stylesheet" href="{{asset('asset/css/custom.css') }}">

    <!-- jQuery -->
    <script src="{{asset('asset/plugins/jquery/jquery.min.js')}}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{asset('asset/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
</head>
{{-- <body > --}}
    <body onload="window.print();">


    <div class="content-wrapper simulasi-page">
        @yield('content')
    </div>    

    <script src="{{asset('asset/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('asset/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('asset/js/custom.js')}}"></script>
    <script src="{{asset('asset/js/file_review.js')}}"></script>
    
    
    <script src="{{asset('asset/js/adminlte.js')}}"></script>
    <script src="{{asset('asset/js/custom.js') }}"></script>

</body>
</html>