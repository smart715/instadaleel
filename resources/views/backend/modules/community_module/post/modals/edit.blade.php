<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Edit Post</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<div class="modal-body">
     <form action="{{ route('post.edit', encrypt($post->id)) }}" method="post" class="ajax-form">
          @csrf
          <div class="row">

               <div class="col-md-12 form-group">
                    <label>Approval</label>
                    <select name="is_approved" class="form-control">
                         <option value="1" @if( $post->is_approved == true ) selected @endif >Approved</option>
                         <option value="0" @if( $post->is_approved == false ) selected @endif >Not Approved</option>
                    </select>
               </div>

               <div class="col-md-12 form-group">
                    <label>Is Shown</label>
                    <select name="is_shown" class="form-control">
                         <option value="1" @if( $post->is_shown == true ) selected @endif >Shown</option>
                         <option value="0" @if( $post->is_shown == false ) selected @endif >Not Shown</option>
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


<link rel="stylesheet" href="{{ asset('backend/css/fancybox/fencybox.min.css') }}">
<script src="{{ asset('backend/js/fancybox/active.js') }}"></script>
<script src="{{ asset('backend/js/fancybox/fency.js') }}"></script>
<script src="{{ asset('backend/js/fancybox/fencybox.min.js') }}"></script>