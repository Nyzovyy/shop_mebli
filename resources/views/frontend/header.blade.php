<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
<!-- <base href="https://www.vox.pl"> -->
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>Vox</title>
<meta name="description" content="description"/>
<meta property="og:url" content=""/>
<meta property="og:site_name" content="VOX"/>
<link rel="stylesheet" type="text/css" href="{{ asset('/css/vox_styles.css') }}">
@yield('head')
{{--<link rel="stylesheet" type="text/css" href="{{ asset('/css/vox-base-head.min.css') }}">--}}
{{--<link rel="stylesheet" type="text/css" href="{{ asset('/bootstrap/css/bootstrap.css') }}">--}}
{{--<script type="text/javascript" src="{{ asset('/js/vox_scripts.min.js') }}"></script>--}}
<script type="text/javascript" src="{{ asset('/js/app/vox-base-head.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/app/vox-freedom-head.js') }}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBjhuDR8N3LFZ8qEUv5XRYS1B5CObydHQM" type="text/javascript" async></script>
