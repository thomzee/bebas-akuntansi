<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="{{ config('path.themes') . '/plugins/fontawesome-free/css/all.min.css' }}">
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- Tempusdominus Bootstrap 4 -->
<link rel="stylesheet" href="{{ config('path.themes') . '/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css' }}">
<!-- iCheck -->
<link rel="stylesheet" href="{{ config('path.themes') . '/plugins/icheck-bootstrap/icheck-bootstrap.min.css' }}">
<!-- JQVMap -->
<link rel="stylesheet" href="{{ config('path.themes') . '/plugins/jqvmap/jqvmap.min.css' }}">
<!-- Theme style -->
<link rel="stylesheet" href="{{ config('path.themes') . '/dist/css/adminlte.min.css' }}">
<!-- overlayScrollbars -->
<link rel="stylesheet" href="{{ config('path.themes') . '/plugins/overlayScrollbars/css/OverlayScrollbars.min.css' }}">
<!-- Daterange picker -->
<link rel="stylesheet" href="{{ config('path.themes') . '/plugins/daterangepicker/daterangepicker.css' }}">
<!-- summernote -->
<link rel="stylesheet" href="{{ config('path.themes') . '/plugins/summernote/summernote-bs4.min.css' }}">

{{--<link rel="stylesheet" href="{{ config('path.themes') . '/plugins/datatables/jquery.dataTables.min.css' }}">--}}
<link rel="stylesheet" href="{{ config('path.themes') . '/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css' }}">
{{--<link rel="stylesheet" href="{{ config('path.themes') . '/plugins/datatables-buttons/buttons.bootstrap4.min.css' }}">--}}
{{--<link rel="stylesheet" href="{{ config('path.themes') . '/plugins/datatables-responsive/responsive.bootstrap4.min.css' }}">--}}

@stack('styles')
