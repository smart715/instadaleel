<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Reset Password</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<div class="modal-body">
    <form class="ajax-form" method="post" action="{{ route('user.reset', $user->id) }}">
        @csrf

        <div class="row">

            <!-- password -->
            <div class="col-md-6 col-12 form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="password">
            </div>

            <!-- password confirmation -->
            <div class="col-md-6 col-12 form-group">
                <label>Password Confirmation</label>
                <input type="password" class="form-control" name="password_confirmation">
            </div>

            <div class="col-md-12 form-group text-right">
                <button type="submit" class="btn btn-outline-dark">
                    Reset
                </button>
            </div>

        </div>
    </form>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
