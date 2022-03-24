@extends("backend.template.layout")

@section('per_page_css')
<link rel="stylesheet" href="{{ asset('backend/css/dropify.min.css') }}">
@endsection

@section('body-content')
<div class="content-wrapper" style="min-height: 147px;">

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item">
                            <a href="{{ route('dashboard') }}">
                                Dashboard
                            </a>
                        </li>
                        <li class="breadcrumb-item active">
                            <a href="#">
                                Profile
                            </a>
                        </li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle" alt="User profile picture"
                                @if(auth('super_admin')->check())

                                    @if(auth('super_admin')->user()->image == null )
                                        src="{{ asset('images/profile/user.png') }}"
                                    @else
                                        src="{{ asset('images/profile/'.auth('super_admin')->user()->image ) }}"
                                    @endif

                                @elseif(auth('web')->check())

                                    @if(auth('web')->user()->image == null )
                                        src="{{ asset('images/profile/user.png') }}"
                                    @else
                                        src="{{ asset('images/profile/'.auth('web')->user()->image ) }}"
                                    @endif

                                @endif
                                >
                            </div>

                            <h3 class="profile-username text-center">
                                @if( auth('super_admin')->check() )
                                {{ auth('super_admin')->user()->name }}
                                @elseif( auth('web')->check() )
                                {{ auth('web')->user()->name }}
                                @endif
                            </h3>

                            <p class="text-muted text-center">
                                @if( auth('super_admin')->check() )
                                Super Admin
                                @elseif( auth('web')->check() )
                                {{ auth('web')->user()->role->name }}
                                @endif
                            </p>

                            <a href="#" class="btn btn-primary btn-block" onclick="document.getElementById('logout-form').submit()">
                                <b>
                                    <i class="fas fa-sign-out-alt mr-2"></i>
                                    Logout
                                    <form action="{{route('do.logout')}}" method="post" id="logout-form">@csrf</form>
                                </b>
                            </a>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card card-primary card-outline">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#basic_information" data-toggle="tab">
                                        Basic Information
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#change_password" data-toggle="tab">
                                        Change Password
                                    </a>
                                </li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">

                                <!-- TAB PANEL START -->
                                <div class="row tab-pane active" id="basic_information">
                                    <form class="ajax-form" method="post" enctype="multipart/form-data" 
                                    @if(auth('super_admin')->
                                    check())
                                    action="{{ route('profile.edit',auth('super_admin')->user()->id) }}"
                                    @elseif(auth('web')->check())
                                    action="{{ route('profile.edit',auth('web')->user()->id) }}"
                                    @endif
                                    >
                                    @csrf
                                        <!-- name -->
                                        <div class="col-auto form-group">
                                            <label>
                                                    Name
                                            </label>
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-users"></i>
                                                    </div>
                                                </div>
                                                <input type="text" name="name" class="form-control" placeholder="Name"
                                                @if( auth('super_admin')->check() )
                                                value="{{ auth('super_admin')->user()->name }}"
                                                @elseif( auth('web')->check() )
                                                value="{{ auth('web')->user()->name }}"
                                                @endif
                                                >
                                            </div>
                                        </div>

                                        <!-- email -->
                                        <div class="col-auto form-group">
                                            <label>
                                                Email
                                            </label>
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-envelope"></i>
                                                    </div>
                                                </div>
                                                <input type="email" name="email" class="form-control" placeholder="Email"
                                                @if( auth('super_admin')->check() )
                                                value="{{ auth('super_admin')->user()->email }}"
                                                @elseif( auth('web')->check() )
                                                value="{{ auth('web')->user()->email }}"
                                                @endif
                                                >
                                            </div>
                                        </div>

                                        <!-- phone -->
                                        <div class="col-auto form-group">
                                            <label>
                                                Phone
                                            </label>
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-phone"></i>
                                                    </div>
                                                </div>
                                                <input type="text" name="phone" class="form-control" placeholder="Phone"
                                                @if(auth('super_admin')->check() )
                                                value="{{ auth('super_admin')->user()->phone }}"
                                                @elseif( auth('web')->check() )
                                                value="{{ auth('web')->user()->phone }}"
                                                @endif
                                                >
                                            </div>
                                        </div>

                                        <!-- image -->
                                        <div class="col-auto form-group">
                                            <div class="dropify-wrapper">
                                                <div class="dropify-message"><span
                                                        class="file-icon"></span>
                                                    <p>
                                                        Profile Picture
                                                    </p>
                                                    <p class="dropify-error">Ooops,
                                                        something wrong appended.</p>
                                                </div>
                                                <div class="dropify-loader"
                                                    style="display: none;"></div>
                                                <div class="dropify-errors-container">
                                                    <ul></ul>
                                                </div><input type="file" id="input-file-now"
                                                    class="dropify" name="image"
                                                    data-default-file=""><button
                                                    type="button"
                                                    class="dropify-clear">Remove</button>
                                                <div class="dropify-preview"
                                                    style="display: none;"><span
                                                        class="dropify-render"></span>
                                                    <div class="dropify-infos">
                                                        <div class="dropify-infos-inner">
                                                            <p class="dropify-filename">
                                                                <span
                                                                    class="file-icon"></span>
                                                                <span
                                                                    class="dropify-filename-inner">1618054231jLxKfola9cDg.jpg</span>
                                                            </p>
                                                            <p
                                                                class="dropify-infos-message">
                                                                Drag and drop or click to
                                                                replace</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-auto form-group text-right">
                                            <button type="submit" class="btn btn-outline-dark">
                                                Update Profile
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                <!-- TAB PANEL END -->

                                <!-- TAB PANEL START -->
                                <div class="tab-pane" id="change_password">
                                    <form class="ajax-form" method="post" enctype="multipart/form-data" 
                                    @if(auth('super_admin')->
                                    check())
                                    action="{{ route('profile.password',auth('super_admin')->user()->id) }}"
                                    @elseif(auth('web')->check())
                                    action="{{ route('profile.password',auth('web')->user()->id) }}"
                                    @endif
                                    >
                                    @csrf

                                        <!-- old password -->
                                        <div class="col-auto form-group">
                                            <label>
                                                    Old Password
                                            </label>
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-key"></i>
                                                    </div>
                                                </div>
                                                <input type="password" name="old_password" class="form-control" placeholder="Old Password"
                                                >
                                            </div>
                                        </div>

                                        <!-- new password -->
                                        <div class="col-auto form-group">
                                            <label>
                                                    New Password
                                            </label>
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-key"></i>
                                                    </div>
                                                </div>
                                                <input type="password" name="password" class="form-control" placeholder="New Password"
                                                >
                                            </div>
                                        </div>

                                        <!-- new password -->
                                        <div class="col-auto form-group">
                                            <label>
                                                    Confirm Password
                                            </label>
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-key"></i>
                                                    </div>
                                                </div>
                                                <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password"
                                                >
                                            </div>
                                        </div>


                                        <div class="col-auto form-group text-right">
                                            <button type="submit" class="btn btn-outline-dark">
                                                Change Password
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                <!-- TAB PANEL END -->

                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
</div>
@endsection

@section('per_page_js')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="{{ asset('backend/js/dropify.min.js') }}"></script>
<script src="{{ asset('backend/js/form-file-uploads.min.js') }}"></script>
<script src="{{  asset('backend/js/ajax_form_submit.js') }}"></script>
@endsection
