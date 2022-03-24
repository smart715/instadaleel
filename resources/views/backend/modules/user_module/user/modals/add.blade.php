<div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Add New User</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
      </button>
 </div>

<div class="modal-body">
    <form class="ajax-form" method="post" action="{{ route('user.add') }}">
        @csrf

        <div class="row">

            <!-- name -->
            <div class="col-md-6 col-12 form-group">
                <label for="name">Name</label><span class="require-span">*</span>
                <input type="text" class="form-control" name="name" >
            </div>

            <!-- email -->
            <div class="col-md-6 col-12 form-group">
                <label for="email">Email</label><span class="require-span">*</span>
                <input id="email" type="email" class="form-control" name="email">
            </div>

            <!-- phone number -->
            <div class="col-md-6 col-12 form-group">
                <label for="phone">Phone</label><span class="require-span">*</span>
                <input id="phone" type="text" class="form-control" name="phone">
            </div>

            <!-- select role -->
            <div class="col-md-6 col-12 form-group">
            <label>Please select a user role</label><span class="require-span">*</span>
                <select name="role_id" class="form-control select2">
                    @foreach( App\Models\UserModule\Role::where("is_active", true)->get() as $role )
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- confirm password -->
            <div class="col-md-6 col-12 form-group">
                <label>Password</label><span class="require-span">*</span>
                <input type="password" class="form-control" name="password">
            </div>

            <!-- confirm password -->
            <div class="col-md-6 col-12 form-group">
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



