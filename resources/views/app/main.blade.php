<!DOCTYPE html>
<html lang="en">
<head>
    @include('app.header')
    @include('app.styles')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
@include('app.navbar')
@include('app.sidebar')

@yield('content')

@include('app.footer')

</div>
<!-- ./wrapper -->

@include('app.scripts')
</body>
</html>
