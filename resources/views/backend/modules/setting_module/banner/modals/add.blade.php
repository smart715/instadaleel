<div class="modal-header">
     <h5 class="modal-title" id="exampleModalLabel">Add New Banner</h5>
     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
     </button>
</div>

<div class="modal-body">
     <form class="ajax-form" method="post" action="{{ route('banner.add') }}">
          @csrf

          <div class="row">

               <!-- Position -->
               <div class="col-md-12 col-12 form-group">
                    <label>Position</label><span class="require-span">*</span>
                    <input type="number" class="form-control" name="position">
               </div>

               <!-- Title -->
               <div class="col-md-12 col-12 form-group">
                    <label>Title</label><span class="require-span">*</span>
                    <input type="text" class="form-control" name="title">
               </div>

               <!-- image -->
               <div class="col-md-12 form-group">
                    <div class="dropify-wrapper">
                         <div class="dropify-message"><span class="file-icon"></span>
                              <p>
                                   Image ( 900x450 )
                              </p>
                              <p class="dropify-error">Ooops,
                                   something wrong appended.</p>
                         </div>
                         <div class="dropify-loader" style="display: none;"></div>
                         <div class="dropify-errors-container">
                              <ul></ul>
                         </div>
                         <input type="file" id="input-file-now" class="dropify" name="image" data-default-file="">
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

               <!-- Button Text -->
               <div class="col-md-12 col-12 form-group">
                    <label>Button Text</label><span class="require-span">*</span>
                    <input type="text" class="form-control" name="button_text">
               </div>

               <!-- Link -->
               <div class="col-md-12 col-12 form-group">
                    <label>Link</label><span class="require-span">*</span>
                    <input type="text" class="form-control" name="link">
               </div>

               <div class="col-md-12 form-group text-right">
                    <button type="submit" class="btn btn-outline-dark">
                         Add
                    </button>
               </div>


          </div>
     </form>
</div>
<div class="modal-footer">
     <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>

<link rel="stylesheet" href="{{ asset('backend/css/dropify.min.css') }}">
<script src="{{ asset('backend/js/dropify.min.js') }}"></script>
<script src="{{ asset('backend/js/form-file-uploads.min.js') }}"></script>