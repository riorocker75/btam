<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>BTAM</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{asset('asset/plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="{{asset('asset/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
 <!-- Select2 -->
<link rel="stylesheet" href="{{asset('asset/plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('asset/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('asset/plugins/bt-datepicker/datepicker.css')}}">

  <link rel="stylesheet" href="{{asset('asset/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{asset('asset/plugins/jqvmap/jqvmap.min.css') }}">
 
  <link rel="stylesheet" href="{{asset('asset/css/adminlte.min.css') }}">
  <link rel="stylesheet" href="{{asset('asset/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('asset/css/custom.css') }}">

</head>
<body class="hold-transition login-page">

	@yield('content')


</div>

<script src="{{asset('asset/plugins/jquery/jquery.min.js') }}"></script>

<script src="{{asset('asset/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<script src="{{asset('asset/plugins/bt-datepicker/datepicker.js')}}"></script>
<!-- Select2 -->
<script src="{{asset('asset/plugins/select2/js/select2.full.min.js')}}"></script>



<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<script src="{{asset('asset/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{asset('asset/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<script src="{{asset('asset/js/adminlte.js') }}"></script>
<script src="{{asset('asset/js/custom.js') }}"></script>

</body>
</html>
