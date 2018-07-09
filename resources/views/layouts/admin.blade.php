<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
{{-------------------------  Head  -----------------------------------------------------------------}}

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>AdminVOX</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.7 -->
	<link rel="stylesheet" href="/admin/bootstrap/css/bootstrap.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="/admin/plugins/font-awesome/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="/admin/plugins/Ionicons/css/ionicons.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="/admin/css/AdminLTE.min.css">
	<!-- AdminLTE Skins. Choose a skin from the css/skins
	   folder instead of downloading all of them to reduce the load. -->
	<link rel="stylesheet" href="/admin/css/skins/_all-skins.min.css">
	<!-- Morris chart -->
	<link rel="stylesheet" href="/admin/plugins/morris.js/morris.css">
	<!-- jvectormap -->
	<link rel="stylesheet" href="/admin/plugins/jvectormap/jquery-jvectormap.css">
	<!-- Date Picker -->
	<link rel="stylesheet" href="/admin/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
	<!-- Daterange picker -->
	<link rel="stylesheet" href="/admin/plugins/bootstrap-daterangepicker/daterangepicker.css">
	<!-- bootstrap wysihtml5 - text editor -->
	<link rel="stylesheet" href="/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<link rel="stylesheet" href="/admin/css/goodsVOX.css">

	<!-- Google Font -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    @yield('head')

	<!-- jQuery 3 -->
	<script src="/admin/plugins/jquery/dist/jquery.js"></script>

    <script src="/admin/js/validate/underscore-min.js"></script>
    <script src="/admin/js/validate/moment.min.js"></script>
    <script src="/admin/js/validate/validate.min.js"></script>

    <!--[Validator]-->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
            ]) !!}
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajaxPrefilter(function( options, originalOptions, jqXHR ) { options.async = true; });

    </script>
    <script type="text/javascript" src="/js/ckeditor/ckeditor.js"></script>


    <!--[endif]-->
  
<style>  
.tab-content {
	border: 1px solid #ddd;
	border-top: 0px;
	padding: 15px;
}
</style>  	
</head>
{{-------------------------  Body  -----------------------------------------------------------------}}

<body class="hold-transition skin-blue sidebar-mini">
	<div id="app">
        <div class="wrapper">
            <header class="main-header">
                {{--тут виводемо view Header.blade з ControllerHeader--}}
                {!! App::call('App\Http\Controllers\Admin\HeaderController@headerMenu') !!}
                        <!-- Left side column. contains the logo and sidebar -->
            </header>
            <aside class="main-sidebar">
                {{--тут виводемо view Header.blade з ControllerHeader--}}
                {!! App::call('App\Http\Controllers\Admin\HeaderController@sidebarMenu') !!}
            </aside>
        @yield('content')
		</div>
    </div>
    <!-- ./wrapper -->

	<!-- jQuery UI 1.11.4 -->
	<script src="/admin/plugins/jquery-ui/jquery-ui.min.js"></script>
	<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
	<script>
		$.widget.bridge('uibutton', $.ui.button);
	</script>
	<!-- Bootstrap 3.3.7 -->
	<script src="/admin/bootstrap/js/bootstrap.js"></script>

	<script src="/js/functions.js"></script>
	<!-- Morris.js charts -->
	<script src="/admin/plugins/raphael/raphael.min.js"></script>
	<script src="/admin/plugins/morris.js/morris.min.js"></script>
	<!-- Sparkline -->
	<script src="/admin/plugins/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
	<!-- jvectormap -->
	<script src="/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
	<script src="/admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
	<!-- jQuery Knob Chart -->
	<script src="/admin/plugins/jquery-knob/dist/jquery.knob.min.js"></script>
	<!-- daterangepicker -->
	<script src="/admin/plugins/moment/min/moment.min.js"></script>
	<script src="/admin/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
	<!-- datepicker -->
	<script src="/admin/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
	<!-- Bootstrap WYSIHTML5 -->
	<script src="/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
	<!-- Slimscroll -->
	<script src="/admin/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<!-- FastClick -->
	<script src="/admin/plugins/fastclick/lib/fastclick.js"></script>
	<!-- AdminLTE App -->
	<script src="/admin/js/adminlte.min.js"></script>
	<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
	<script src="/admin/js/pages/dashboard.js"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="/admin/js/demo.js"></script>

    @yield('script')
    @yield('footer')

</body>
</html>
