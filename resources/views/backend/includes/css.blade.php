
@if($app_info)
<link rel="shortcut icon" href="{{ asset('images/info/'.$app_info->fav) }}">
@endif

<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css">

<!-- Theme style -->
<link rel="stylesheet" href="{{ asset('backend/css/adminlte/adminlte.min.css') }}">

<link rel="stylesheet" href="{{ asset('backend/css/loader.css') }}">

<!-- BEGIN: Custom CSS-->
<link rel="stylesheet" type="text/css" href="{{ asset('backend/css/custom.css') }}">
<!-- END: Custom CSS-->

@yield("per_page_css")