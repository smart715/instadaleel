<div class="modal-header">
     <h5 class="modal-title" id="exampleModalLabel">Add New Event</h5>
     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
     </button>
</div>

<div class="modal-body">
     <form class="ajax-form" method="post" action="{{ route('event.add') }}">
          @csrf

          <div class="row">

               <!-- Position -->
               <div class="col-md-6 col-12 form-group">
                    <label>Position</label><span class="require-span">*</span>
                    <input type="number" min="1" class="form-control" name="position">
               </div>

               <!-- Title -->
               <div class="col-md-6 col-12 form-group">
                    <label>Title</label><span class="require-span">*</span>
                    <input type="text" class="form-control" name="title">
               </div>

               <!-- Description -->
               <div class="col-md-12 form-group">
                    <label>Description</label>
                    <textarea name="description" rows="3" id="description" class="form-control"></textarea>
               </div>

               <!-- Image -->
               <div class="col-md-12 form-group">
                    <div class="dropify-wrapper">
                         <div class="dropify-message"><span class="file-icon"></span>
                              <p>
                                   Image ( 500x400 )
                              </p>
                              <p class="dropify-error">
                                   Ooops, something wrong appended.
                              </p>
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

               <!-- Location -->
               <div class="col-md-6 col-12 form-group">
                    <label>Location</label><span class="require-span">*</span>
                    <select name="location_id" class="chosen">
                         @foreach( $locations as $location )
                              <option value="{{ $location->id }}">{{ $location->name }}</option>
                         @endforeach
                    </select>
               </div>

               <!-- Event Location -->
               <div class="col-md-6 col-12 form-group">
                    <label>Event Location</label><span class="require-span">*</span>
                    <input type="text" class="form-control" name="event_location">
               </div>

               <!-- Event Organizer Location -->
               <div class="col-md-6 col-12 form-group">
                    <label>Event Organizer Location</label><span class="require-span">*</span>
                    <input type="text" class="form-control" name="event_organizer_location">
               </div>

               <!-- Address -->
               <div class="col-md-6 col-12 form-group">
                    <label>Address</label><span class="require-span">*</span>
                    <input type="text" class="form-control" name="address">
               </div>

               <!-- Date -->
               <div class="col-md-6 col-12 form-group">
                    <label>Date</label><span class="require-span">*</span>
                    <input type="date"  class="form-control" name="date">
               </div>

               <!-- Time -->
               <div class="col-md-6 col-12 form-group">
                    <label>Time</label><span class="require-span">*</span>
                    <input type="time"  class="form-control" name="time">
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

<!-- Dropify -->
<link rel="stylesheet" href="{{ asset('backend/css/dropify.min.css') }}">
<script src="{{ asset('backend/js/dropify.min.js') }}"></script>
<script src="{{ asset('backend/js/form-file-uploads.min.js') }}"></script>

<!-- chosen -->
<link rel="stylesheet" href="{{ asset('backend/css/chosen/choosen.min.css') }}">
<script src="{{ asset('backend/js/chosen/choosen.min.js') }}"></script>
<script>
     $(".chosen").chosen()
</script>

<!-- CK Editor -->
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script>
     $(document).ready(function(){
          CKEDITOR.replace('description');
     })
</script>


