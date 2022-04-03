<div class="modal-header">
     <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete this event?</h5>
     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
     </button>
</div>

<div class="modal-footer">
     <form action="{{ route('event.delete', encrypt($event->id)) }}" method="post" class="ajax-form">
          @csrf
          <button type="submit" class="btn btn-danger">Delete</button>
     </form>
     <button type="button" class="btn btn-success" data-dismiss="modal">No</button>
</div>




