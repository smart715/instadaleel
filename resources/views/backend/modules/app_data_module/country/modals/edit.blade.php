<div class="modal-header">
     <h5 class="modal-title" id="exampleModalLabel">{{ $country->name }}</h5>
     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
     </button>
</div>

<div class="modal-body">
     <form class="ajax-form" method="post" action="{{ route('country.edit', encrypt($country->id)) }}">
          @csrf

          <div class="row">

               <!-- Name -->
               <div class="col-md-12 col-12 form-group">
                    <label>Name</label><span class="require-span">*</span>
                    <input type="text" class="form-control" name="name" value="{{ $country->name }}">
               </div>

               <!-- Image -->
               <div class="col-md-12 form-group">
                    <div class="dropify-wrapper">
                         <div class="dropify-message"><span class="file-icon"></span>
                              <p>
                                   Image ( 50x50 )
                              </p>
                              <p class="dropify-error">Ooops,
                                   something wrong appended.</p>
                         </div>
                         <div class="dropify-loader" style="display: none;"></div>
                         <div class="dropify-errors-container">
                              <ul></ul>
                         </div>
                         <input type="file" id="input-file-now" class="dropify" name="image" data-default-file="">
                         <img src="{{ asset('images/country/'. $country->image) }}" class="mt-2" width="50px" alt="">
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

               <!-- Select Status -->
               <div class="col-md-12 col-12 form-group">
                    <label>Select Status</label><span class="require-span">*</span>
                    <select class="form-control" name="is_active">
                         <option value="1" @if( $country->is_active == true ) selected @endif >Active
                         </option>
                         <option value="0" @if( $country->is_active == false ) selected @endif >Inactive
                         </option>
                    </select>
               </div>


               <div class="col-md-12 form-group text-right">
                    <button type="submit" class="btn btn-outline-dark">
                         Update
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


<link href="{{ asset('backend/css/select2/form-select2.min.css') }}" rel="stylesheet">
<link href="{{ asset('backend/css/select2/select2-materialize.css') }}" rel="stylesheet">
<link href="{{ asset('backend/css/select2/select2.min.css') }}" rel="stylesheet">
<script src="{{ asset('backend/js/select2/form-select2.min.js') }}"></script>
<script src="{{ asset('backend/js/select2/select2.full.min.js') }}"></script>
<script>
    $(document).ready(function domReady() {
        $(".select2").select2({
            dropdownAutoWidth: true,
            width: '100%',
            dropdownParent: $('#myModal')
        });
    });
</script>