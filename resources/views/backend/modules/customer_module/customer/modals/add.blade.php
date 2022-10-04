<div class="modal-header">
     <h5 class="modal-title" id="exampleModalLabel">Add New Customer</h5>
     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
     </button>
</div>

<div class="modal-body">
     <form class="ajax-form" method="post" action="{{ route('customer.add') }}">
          @csrf

          <div class="row">

               <!-- Name -->
               <div class="col-md-12 col-12 form-group">
                    <label>First Name</label><span class="require-span">*</span>
                    <input type="text" class="form-control" name="firstname">
               </div>
               <!-- Name -->
               <div class="col-md-12 col-12 form-group">
                    <label>Last Name</label><span class="require-span">*</span>
                    <input type="text" class="form-control" name="lastname">
               </div>

               <!-- Phone -->
               <div class="col-md-12 col-12 form-group">
                    <label>Phone</label><span class="require-span">*</span>
                    <input type="text" class="form-control" name="phone">
               </div>

               <!-- email -->
               <div class="col-md-12 col-12 form-group">
                    <label>Email</label><span class="require-span">*</span>
                    <input type="email" class="form-control" name="email">
               </div>

               <!-- password -->
               <div class="col-md-12 col-12 form-group">
                    <label>Password</label><span class="require-span">*</span>
                    <input type="password" class="form-control" name="password">
               </div>

               <!-- password -->
               <div class="col-md-12 col-12 form-group">
                    <label>Confirm Password</label><span class="require-span">*</span>
                    <input type="password" class="form-control" name="password_confirmation">
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