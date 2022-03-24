
<!-- BEGIN PAGE VENDOR JS-->
<script src="{{  asset('backend/js/chart.min.js') }}"></script>
<script src="{{  asset('backend/js/chartist.min.js') }}"></script>
<script src="{{  asset('backend/js/chartist-plugin-tooltip.js') }}"></script>
<script src="{{  asset('backend/js/chartist-plugin-fill-donut.min.js') }}"></script>
<!-- END PAGE VENDOR JS-->


<!-- jQuery -->
<script src="{{ asset('backend/js/adminlte/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('backend/js/adminlte/bootstrap.bundle.min.js') }}"></script>
<!-- bs-custom-file-input -->
<script src="{{ asset('backend/js/adminlte/bs-custom-file-input.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('backend/js/adminlte/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('backend/js/adminlte/demo.js') }}"></script>
<!-- Page specific script -->
<script>
    $(function () {
        bsCustomFileInput.init();
    });
</script>

@yield("per_page_js")
