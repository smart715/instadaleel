<div class="modal-header">
     <h5 class="modal-title" id="exampleModalLabel">{{ $city->name }}</h5>
     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
     </button>
</div>

<div class="modal-body">
     <form class="ajax-form" method="post" action="{{ route('city.edit', encrypt($city->id)) }}">
          @csrf

          <div class="row">

               <!-- Select Country -->
               <div class="col-md-12 col-12 form-group">
                    <label>Select Country</label><span class="require-span">*</span>
                    <select name="location_id" class="form-control select2">
                         @foreach( $countries as $country )
                         <option value="{{ $country->id }}" @if( $country->id == $city->location_id ) selected @endif >{{ $country->name }}</option>
                         @endforeach
                    </select>
               </div>

               <!-- Name -->
               <div class="col-md-12 col-12 form-group">
                    <label>Name</label><span class="require-span">*</span>
                    <input type="text" class="form-control" name="name" value="{{ $city->name }}">
               </div>

               <!-- Select Status -->
               <div class="col-md-12 col-12 form-group">
                    <label>Select Status</label><span class="require-span">*</span>
                    <select class="form-control" name="is_active">
                         <option value="1" @if( $city->is_active == true ) selected @endif >Active
                         </option>
                         <option value="0" @if( $city->is_active == false ) selected @endif >Inactive
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