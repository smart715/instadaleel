<div class="modal-header">
     <h5 class="modal-title" id="exampleModalLabel">Add New Category</h5>
     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
     </button>
</div>

<div class="modal-body">
     <form class="ajax-form" method="post" action="{{ route('category.add') }}">
          @csrf

          <div class="row">

               <!-- Position -->
               <div class="col-md-12 col-12 form-group">
                    <label>Position</label><span class="require-span">*</span>
                    <input type="number" class="form-control" name="position">
               </div>

               <!-- Name -->
               <div class="col-md-12 col-12 form-group">
                    <label>Name</label><span class="require-span">*</span>
                    <input type="text" class="form-control" name="name">
               </div>

               <!-- Icon -->
               <div class="col-md-12 form-group">
                    <div class="dropify-wrapper">
                         <div class="dropify-message"><span class="file-icon"></span>
                              <p>
                                   Icon ( 50x50 )
                              </p>
                              <p class="dropify-error">Ooops,
                                   something wrong appended.</p>
                         </div>
                         <div class="dropify-loader" style="display: none;"></div>
                         <div class="dropify-errors-container">
                              <ul></ul>
                         </div>
                         <input type="file" id="input-file-now" class="dropify" name="icon" data-default-file="">
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

               <!-- Select Parent -->
               <div class="col-md-12 col-12 form-group">
                    <label>Select Parent</label><span class="require-span">*</span>
                    <select name="category_id" class="form-control select2">


                         @if( isset($category) )
                              <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                         @else
                              <option value="NoParent" selected>No Parent</option>
                         @endif

                         @foreach( $categories as $category )
                              <option value="{{ $category->id }}">
                                   {{ $category->name }} ( Parent Category )
                              </option>

                              @foreach( $category->childrenCategories as $childCategory )
                                   @php
                                        $string = "--";
                                   @endphp
                                   @include('backend.modules.app_data_module.category.recursive.child_category', [
                                        'child_category' => $childCategory,
                                        'string' => $string
                                   ])
                              @endforeach

                         @endforeach
                    </select>
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