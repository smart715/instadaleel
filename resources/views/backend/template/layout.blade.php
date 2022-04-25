<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel</title>

    @include("backend.includes.css")

    <style>
         .custom-alert{
            position: fixed;
            left: 50%;
            top: 1%;
            width: 30%;
            transform: translateX(-50%);
            min-height: max-content;
            z-index: 99999;
            background: white;
            border-radius: 5px;
            border: 1px solid #d1d1d1;
            box-shadow: black 1px 1px 4px -1px;
            padding: 25px 15px;
        }
        .custom-alert .logo img{
            width: 60%;
            display: block;
            margin: 0 auto;
        }
        .custom-alert p{
            text-align: center;
            margin-top: 15px;
        }
    </style>

</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- NAV BAR START -->
        @include("backend.includes.navbar")
        <!-- NAV BAR END -->

        <!-- LEFT SIDEBAR START -->
        @include("backend.includes.leftsidebar")
        <!-- LEFT SIDEBAR END -->

        <!-- Content Wrapper. Contains page content -->
        <div class="loading">Loading&#8230;</div>
        @yield('body-content')
        <!-- /.content-wrapper -->

        @if( session()->has('success') || session()->has('warning') || session()->has('error') )
        <div class="alert alert-dismissible fade show custom-alert" role="alert">
            <div class="logo">
                <img src="{{ asset('images/info/'. $app_info->logo) }}" class="img-fluid" alt="logo">
            </div>
            <hr>
            <p>
                @if( session()->get('success') )
                        {{ session()->get('success') }}
                @elseif(  session()->get('warning') )
                        {{ session()->get('warning') }}
                @elseif(  session()->get('error') )
                        {{ session()->get('error') }}
                @endif
            </p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        <!-- MY MODAL -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                </div>
            </div>
        </div>
        <!-- MY MODAL END -->

        <!-- MY MODAL large -->
        <div class="modal fade bd-example-modal-lg" id="largeModal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">

                </div>
            </div>
        </div>
        <!-- MY MODAL large END -->


        <!-- FOOTER START -->
        @include("backend.includes.footer")
        <!-- FOOTER END -->

    </div>
    <!-- ./wrapper -->

    @include("backend.includes.script")
</body>

</html>
