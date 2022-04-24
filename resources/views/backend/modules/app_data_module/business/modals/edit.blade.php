<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Edit Business Code : {{ $business->code }}</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<div class="modal-body">
     <form action="{{ route('business.edit', encrypt($business->id)) }}" method="post" class="ajax-form">
          @csrf
          <div class="row">

               <div class="col-md-12 form-group">
                    <label>Is Active</label>
                    <select name="is_active" class="form-control">
                         <option value="1" @if( $business->is_active == true ) selected @endif >Active</option>
                         <option value="0" @if( $business->is_active == false ) selected @endif >Inactive</option>
                    </select>
               </div>

               <div class="col-md-12 form-group">
                    <label>Is Pinned</label>
                    <select name="is_pinned" class="form-control">
                         <option value="1" @if( $business->is_pinned == true ) selected @endif >Pinned</option>
                         <option value="0" @if( $business->is_pinned == false ) selected @endif >Not Pinned</option>
                    </select>
               </div>

               <div class="col-md-12 form-group">
                    <label>Status</label>
                    <select name="status" class="form-control">
                         <option value="Running" @if( $business->status == "Running" ) selected @endif >Running</option>
                         <option value="Expired" @if( $business->status == "Expired" ) selected @endif >Expired</option>
                    </select>
               </div>

               <div class="col-md-12 form-group">
                    <button class="btn btn-success" type="submit">
                         Update
                    </button>
               </div>

          </div>
     </form>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
