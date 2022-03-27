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
                                        All Boxes
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
                         <div class="card card-primary card-outline table-responsive">
                              <div class="card-header text-right">
                              </div>
                              <div class="card-body">
                                   <form action="{{ route('boxes.update') }}" method="post" class="ajax-form" enctype="multipart/form-data"> 
                                        @csrf
                                        <div class="row">
                                             @foreach( $boxs as $box )
                                             <div class="col-md-6 col-12">
                                                  <div class="row">

                                                       <!-- title -->
                                                       <div class="col-md-12 form-group">
                                                            <label>Title</label>
                                                            <input type="text" class="form-control" name="title[]" value="{{ $box->title }}">
                                                       </div>

                                                       <!-- description -->
                                                       <div class="col-md-12 form-group">
                                                            <label>Description</label>
                                                            <textarea name="description[]" rows="3" id="description-{{ $box->id }}" class="form-control">
                                                                 {!! $box->description !!}
                                                            </textarea>
                                                       </div>

                                                       <!-- Image -->
                                                       <div class="col-md-12 form-group">
                                                            <div class="dropify-wrapper">
                                                                 <div class="dropify-message"><span class="file-icon"></span>
                                                                      <p>
                                                                           Image ( 50x50 )
                                                                      </p>
                                                                      <p class="dropify-error">
                                                                           Ooops, something wrong appended.
                                                                      </p>
                                                                 </div>
                                                                 <div class="dropify-loader" style="display: none;"></div>
                                                                 <div class="dropify-errors-container">
                                                                      <ul></ul>
                                                                 </div>
                                                                 <input type="file" id="input-file-now" class="dropify" name="image[]" data-default-file="">
                                                                 <img src="{{ asset('images/boxs/'. $box->image) }}" class="mt-2" width="50px" alt="">
                                                                 <button type="button" class="dropify-clear">Remove</button>
                                                                 <div class="dropify-preview" style="display: none;"><span class="dropify-render"></span>
                                                                      <div class="dropify-infos">
                                                                           <div class="dropify-infos-inner">
                                                                                <p class="dropify-filename">
                                                                                     <span class="file-icon"></span>
                                                                                     <span class="dropify-filename-inner">1618054231jLxKfola9cDg.jpg</span>
                                                                                </p>
                                                                                <p class="dropify-infos-message">
                                                                                     Drag and drop or click to replace
                                                                                </p>
                                                                           </div>
                                                                      </div>
                                                                 </div>
                                                            </div>
                                                       </div>
                                                  </div>
                                             </div>
                                             @endforeach
                                        </div>
                                        <div class="row">
                                             <div class="col-md-12 text-right">
                                                  <button type="submit" class="btn btn-success">
                                                       Save
                                                  </button>
                                             </div>
                                        </div>
                                   </form>
                              </div>
                         </div>

                    </div>
               </div>

          </div>
     </section>

</div>
@endsection

@section('per_page_js')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="{{ asset('backend/js/custom-script.min.js') }}"></script>
<script src="{{  asset('backend/js/ajax_form_submit.js') }}"></script>
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script>
     $(document).ready(function() {
          CKEDITOR.replace('description-1');
          CKEDITOR.replace('description-2');
     })
</script>

<script src="{{ asset('backend/js/dropify.min.js') }}"></script>
<script src="{{ asset('backend/js/form-file-uploads.min.js') }}"></script>
@endsection