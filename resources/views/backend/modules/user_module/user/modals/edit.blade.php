<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<div class="modal-body">
    <form class="ajax-form" method="post" action="{{ route('user.update', $user->id) }}">
        @csrf

        <div class="row">
            <!-- name -->
            <div class="col-md-6 col-12 form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" value="{{ $user->name }}">
            </div>

            <!-- email -->
            <div class="col-md-6 col-12 form-group">
                <label for="email">Email</label>
                <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}">
            </div>

            <!-- phone number -->
            <div class="col-md-6 col-12 form-group">
                <label for="phone">Phone</label>
                <input id="phone" type="text" class="form-control" name="phone" value="{{ $user->phone }}">
            </div>

            <!-- select role -->
            <div class="col-md-6 col-12 form-group">
            <label>Please select a user role</label>
                <select name="role_id" class="form-control select2">
                    @foreach( App\Models\UserModule\Role::where("is_active", true)->get() as $role )
                    <option value="{{ $role->id }}"
                    @if( $user->role->id == $role->id )
                    selected
                    @endif
                    >{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- user status -->
            <div class="col-md-12 col-12 form-group">
                <label>User Status</label>
                <select class="form-control select2" name="is_active">
                    <option value="1" @if( $user->is_active == true ) selected @endif >Active
                    </option>
                    <option value="0" @if( $user->is_active == false ) selected @endif >Inactive
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
