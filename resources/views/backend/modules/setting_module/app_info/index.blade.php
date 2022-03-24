@extends("backend.template.layout")

@section('per_page_css')
<link rel="stylesheet" href="{{ asset('backend/css/dropify.min.css') }}">
@endsection

@section('body-content')
<div class="content-wrapper" style="min-height: 147px;">

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item">
                            <a href="{{ route('dashboard') }}">
                                Dashboard
                            </a>
                        </li>
                        <li class="breadcrumb-item active">
                            <a href="#">
                                App Information
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
                <div class="col-md-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-edit"></i>
                                Update App Information
                            </h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('app.info.update', $app_info->id) }}" method="post" class="ajax-form" enctype="multipart/form-data">
                            @csrf
                                <div class="row">
                                    <div class="col-5 col-sm-3">
                                        <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist"
                                            aria-orientation="vertical">

                                            <a class="nav-link active" id="vert-tabs-home-tab" data-toggle="pill"
                                                href="#tab-one" role="tab" aria-controls="vert-tabs-home"
                                                aria-selected="true">
                                                Logo & Fav
                                            </a>


                                        </div>
                                    </div>
                                    <div class="col-7 col-sm-9">

                                        <div class="tab-content" id="vert-tabs-tabContent">

                                            <!-- ITEM START -->
                                            <div class="tab-pane text-left fade active show" id="tab-one"
                                                role="tabpanel" aria-labelledby="vert-tabs-home-tab">
                                                <div class="row">

                                                    <!-- logo -->
                                                    <div class="col-md-6 form-group">
                                                        <div class="dropify-wrapper">
                                                            <div class="dropify-message"><span
                                                                    class="file-icon"></span>
                                                                <p>
                                                                    Logo ( 175x85 )
                                                                </p>
                                                                <p class="dropify-error">Ooops,
                                                                    something wrong appended.</p>
                                                            </div>
                                                            <div class="dropify-loader"
                                                                style="display: none;"></div>
                                                            <div class="dropify-errors-container">
                                                                <ul></ul>
                                                            </div>
                                                            <input type="file" id="input-file-now"
                                                                class="dropify" name="logo"
                                                                data-default-file="">
                                                            <img src="{{ asset('images/info/'. $app_info->logo) }}" style="width: 100px; margin-top: 10px" alt="">
                                                            <button
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

                                                    <!-- Fav -->
                                                    <div class="col-md-6 form-group">
                                                        <div class="dropify-wrapper">
                                                            <div class="dropify-message"><span
                                                                    class="file-icon"></span>
                                                                <p>
                                                                    Fav Icon ( 32x32 )
                                                                </p>
                                                                <p class="dropify-error">Ooops,
                                                                    something wrong appended.</p>
                                                            </div>
                                                            <div class="dropify-loader"
                                                                style="display: none;"></div>
                                                            <div class="dropify-errors-container">
                                                                <ul></ul>
                                                            </div>
                                                            <input type="file" id="input-file-now"
                                                                class="dropify" name="fav"
                                                                data-default-file="">
                                                            <img src="{{ asset('images/info/'. $app_info->fav) }}" style="width: 32px; margin-top: 10px" alt="">
                                                            <button
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

                                                </div>
                                            </div>
                                            <!-- ITEM END -->

                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 form-group text-right">
                                        <button type="submit" class="btn btn-outline-dark">
                                            Update Information
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>

        </div>
    </section>

</div>
@endsection

@section('per_page_js')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script src="{{ asset('backend/js/dropify.min.js') }}"></script>
<script src="{{ asset('backend/js/form-file-uploads.min.js') }}"></script>
<script src="{{  asset('backend/js/ajax_form_submit.js') }}"></script>
@endsection
