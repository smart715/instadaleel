<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Are you sure! your want to delete this business review</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<div class="modal-footer">
    <form action="{{ route('business.review.delete', encrypt($business_review->id)) }}" class="ajax-form" method="post">
         @csrf
         <button type="submit" class="btn btn-danger">Yes, Delete</button>
    </form>
    <button type="button" class="btn btn-success" data-dismiss="modal">No</button>
</div>
