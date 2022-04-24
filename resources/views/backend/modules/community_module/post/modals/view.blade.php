<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Post Details</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<div class="modal-body">
     <div class="row">
          <div class="col-sm-12">
               <table class="table table-bordered table-sm">
                    <tbody>
                         <tr>
                              <td>Post</td>
                              <td>{{ $post->description }}</td>
                         </tr>
                         @php
                              $post_images = json_decode($post->image)
                         @endphp
                         <tr>
                              <td>Post Image</td>
                              <td>
                                   @foreach( $post_images as $image )
                                   <a data-fancybox='gallery' href="{{ asset('images/post/'. $image->image) }}">
                                        <img src="{{ asset('images/post/'. $image->image) }}" width="50px" alt="">
                                   </a>
                                   @endforeach
                              </td>
                         </tr>
                         <tr>
                              <td>Created Date & Time</td>
                              <td>{{ $post->created_at->toDayDateTimeString() }}</td>
                         </tr>
                         <tr>
                              <td>Last Update</td>
                              <td>{{ $post->updated_at->toDayDateTimeString() }}</td>
                         </tr>
                    </tbody>
               </table>
          </div>
     </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>


<link rel="stylesheet" href="{{ asset('backend/css/fancybox/fencybox.min.css') }}">
<script src="{{ asset('backend/js/fancybox/active.js') }}"></script>
<script src="{{ asset('backend/js/fancybox/fency.js') }}"></script>
<script src="{{ asset('backend/js/fancybox/fencybox.min.js') }}"></script>