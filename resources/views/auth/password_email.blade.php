<!DOCTYPE html>
<html lang="en">

<!--================================================================================
	Item Name: Materialize - Material Design Admin Template
	Version: 3.1
	Author: GeeksLabs
	Author URL: http://www.themeforest.net/user/geekslabs
================================================================================ -->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="description"
        content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google. ">
    <meta name="keywords"
        content="materialize, admin template, dashboard template, flat admin template, responsive admin template,">
    <title>Password Email</title>

    <!-- Favicons-->
    <link rel="icon" href="{{ asset('backend/img/1617775933z1Uv4ufhed8H.png') }}" sizes="32x32">
    <!-- Favicons-->
    <link rel="apple-touch-icon-precomposed" href="images/favicon/apple-touch-icon-152x152.png">
    <!-- For iPhone -->
    <meta name="msapplication-TileColor" content="#00bcd4">
    <meta name="msapplication-TileImage" content="images/favicon/mstile-144x144.png">
    <!-- For Windows Phone -->


    <!-- CORE CSS-->

    <link href="{{ asset('auth/css/materialize.min.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="{{ asset('auth/css/materialize.icon.min.css') }}" rel="stylesheet">
    <link href="{{ asset('auth/css/style.min.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
    <link rel="stylesheet" href="{{ asset('backend/css/loader.css') }}">
    <!-- Custome CSS-->
    <link href="{{ asset('auth/css/custom.min.css') }}" type="text/css" rel="stylesheet" media="screen,projection">

    <link href="{{ asset('auth/css/page-center.css') }}" type="text/css" rel="stylesheet" media="screen,projection">

    <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
    <link href="{{ asset('auth/css/prism.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="{{ asset('auth/css/perfect-scrollbar.css') }}" type="text/css" rel="stylesheet"
        media="screen,projection">

</head>

<body class="cyan">
    <!-- Start Page Loading -->
    <div id="loader-wrapper">
        <div id="loader"></div>
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
    </div>
    <!-- End Page Loading -->
    <div class="loading">Loading&#8230;</div>


    <div id="login-page" class="row">
        <div class="col s12 z-depth-4 card-panel">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            @if( session()->has('success') )
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
            @endif

            @if( session()->has('failed') )
            <div class="alert alert-danger">
                {{ session()->get('failed') }}
            </div>
            @endif
            <form class="login-form ajax-form" action="{{ route('post.email') }}" method="post">
                @csrf
                <div class="row">
                    <div class="input-field col s12 center">
                        @if($app_info)
                        <img src="{{ asset('images/info/'.$app_info->logo) }}" alt=""
                            class="responsive-img valign profile-image-login">
                        @endif
                    </div>
                </div>
                <div class="row margin">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">email</i>
                        <input id="email" type="text" name="email" class="validate">
                        <label for="email">Email Address</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <button type="submit" class="btn waves-effect waves-light col s12">Send Password Reset Link</button>
                        <a style="
                            display: block;
                            text-align: center;
                            margin-top: 50px
                        ;
                        " href="{{ route('login.show') }}">Login Here</a>
                    </div>
                </div>
                <div class="progress">
                    <div class="indeterminate"></div>
                </div>
            </form>
        </div>
    </div>



    <!-- ================================================
    Scripts
    ================================================ -->

    <!-- jQuery Library -->
    <script type="text/javascript" src="{{ asset('auth/js/jquery-1.11.2.min.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{ asset('backend/js/ajax_form_submit.js') }}"></script>
    <!--materialize js-->
    <script type="text/javascript" src="{{ asset('auth/js/materialize.min.js') }}"></script>
    <!--prism-->
    <script type="text/javascript" src="{{ asset('auth/js/prism.js') }}"></script>
    <!--scrollbar-->
    <script type="text/javascript" src="{{ asset('auth/js/perfect-scrollbar.min.js') }}"></script>

    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="{{ asset('auth/js/plugins.min.js') }}"></script>
    <!--custom-script.js - Add your own theme custom JS-->
    <script type="text/javascript" src="{{ asset('auth/js/custom-script.js') }}"></script>

</body>

</html>
