<!-- jQuery -->
<script src="{{ config('path.themes') . '/plugins/jquery/jquery.min.js' }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ config('path.themes') . '/plugins/jquery-ui/jquery-ui.min.js' }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ config('path.themes') . '/plugins/bootstrap/js/bootstrap.bundle.min.js' }}"></script>
<!-- ChartJS -->
<script src="{{ config('path.themes') . '/plugins/chart.js/Chart.min.js' }}"></script>
<!-- Sparkline -->
<script src="{{ config('path.themes') . '/plugins/sparklines/sparkline.js' }}"></script>
<!-- JQVMap -->
<script src="{{ config('path.themes') . '/plugins/jqvmap/jquery.vmap.min.js' }}"></script>
<script src="{{ config('path.themes') . '/plugins/jqvmap/maps/jquery.vmap.usa.js' }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ config('path.themes') . '/plugins/jquery-knob/jquery.knob.min.js' }}"></script>
<!-- daterangepicker -->
<script src="{{ config('path.themes') . '/plugins/moment/moment.min.js' }}"></script>
<script src="{{ config('path.themes') . '/plugins/daterangepicker/daterangepicker.js' }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ config('path.themes') . '/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js' }}"></script>
<!-- Summernote -->
<script src="{{ config('path.themes') . '/plugins/summernote/summernote-bs4.min.js' }}"></script>
<!-- overlayScrollbars -->
<script src="{{ config('path.themes') . '/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js' }}"></script>
<!-- AdminLTE App -->
<script src="{{ config('path.themes') . '/dist/js/adminlte.js' }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ config('path.themes') . '/dist/js/demo.js' }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ config('path.themes') . '/dist/js/pages/dashboard.js' }}"></script>

@stack('scripts')
