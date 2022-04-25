<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Edit offer : {{ $offer->title }}</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<div class="modal-body">
     <form action="{{ route('offer.edit', encrypt($offer->id)) }}" method="post" class="ajax-form">
          @csrf
          <div class="row">

               <div class="col-md-12 form-group">
                    <label>Is Active</label>
                    <select name="is_active" class="form-control">
                         <option value="1" @if( $offer->is_active == true ) selected @endif >Active</option>
                         <option value="0" @if( $offer->is_active == false ) selected @endif >Inactive</option>
                    </select>
               </div>

               <div class="col-md-12 form-group">
                    <label>Is Approved</label>
                    <select name="is_approved" class="form-control">
                         <option value="1" @if( $offer->is_approved == true ) selected @endif >Approved</option>
                         <option value="0" @if( $offer->is_approved == false ) selected @endif >Not Approved</option>
                    </select>
               </div>

               <div class="col-md-12 form-check mb-3 ml-2">
                    <input class="form-check-input" type="checkbox" value="1" name="send_email" id="send-email">
                    <label class="form-check-label" for="send-email">
                         Notify customer via email 
                    </label>                    
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
