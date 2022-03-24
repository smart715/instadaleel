<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Role : {{ $role->name }}</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<div class="modal-body">
    <form class="ajax-form" method="post" action="{{ route('role.update', $role->id) }}">
        @csrf
        <div class="row">

            <!-- name -->
            <div class="col-md-12 col-12 form-group">
                <label for="name">Role Name</label><span class="require-span">*</span>
                <input type="text" class="form-control" name="name" value="{{ $role->name }}">
            </div>

            <!-- status -->
            <div class="col-md-12 col-12 form-group" >
                <label>Status</label>
                <select class="form-control select2" name="is_active">
                    <option value="1" @if( $role->is_active == true ) selected @endif >Active</option>
                    <option value="0" @if( $role->is_active == false ) selected @endif >Inactive</option>
                </select>
            </div>

            <!-- permission -->
            <div class="col-md-12 form-group main-group">
                <div class="row">

                    @foreach( App\Models\UserModule\Module::orderBy("position","asc")->get() as $module )
                    @foreach( $module->permission as $module_permission )
                    @if($module->key == $module_permission->key )
                    <div class="permission_block" style="padding: 0;">
                        <p style="
                                border-bottom: 1px solid #e0d9d9;
                                background: #323232;
                                color: white;
                                padding: 5px;
                            ">
                            <label>
                                <input type="checkbox" class="module_check" name="permission[]"
                                    value="{{ $module_permission->id }}" @php $i=0; @endphp @foreach( $role->permission as
                                $role_permission )
                                @if( $role_permission->id == $module_permission->id )
                                {{ $i++ }}
                                @endif
                                @endforeach
                                @if( $i != 0 )
                                checked
                                @endif
                                >
                                <span>{{ $module->name }}</span>
                            </label>
                        </p>
                        <div class="sub_module_block">
                            <ul>
                                @foreach( $module->permission as $sub_module_permission )
                                @if( $sub_module_permission->key != $module->key )
                                <p>
                                    <label>
                                        <input type="checkbox" class="sub_module_check" name="permission[]"
                                            value="{{ $sub_module_permission->id }}" @php $j=0; @endphp @foreach(
                                            $role->permission as $role_permission )
                                        @if( $role_permission->id == $sub_module_permission->id )
                                        {{ $j++ }}
                                        @endif
                                        @endforeach
                                        @if( $i == 0 )
                                        disabled
                                        @endif
                                        @if( $j > 0 )
                                        checked
                                        @endif
                                        />
                                        <span>{{ $sub_module_permission->display_name }}</span>
                                    </label>
                                </p>
                                @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @endif
                    @endforeach
                    @endforeach
                </div>
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
            dropdownParent: $('#largeModal')
        });
    });
</script>

<script>
    $(".module_check").click(function (e) {
        let $this = $(this);
        if (e.target.checked == true) {
            $this.closest(".permission_block").find(".sub_module_block").find(".sub_module_check").removeAttr(
                "disabled")
        } else {
            $this.closest(".permission_block").find(".sub_module_block").find(".sub_module_check").attr(
                "disabled", "disabled")
        }
    })
</script>
