<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel"> {{ $banner->title }}</h5>
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
                              <td>Position</td>
                              <td>{{ $banner->position }}</td>
                         </tr>
                         <tr>
                              <td>Title</td>
                              <td>{{ $banner->title }}</td>
                         </tr>
                         <tr>
                              <td>Image</td>
                              <td>
                                   <img src="{{ asset('images/banner/'. $banner->image) }}" width="100px">
                              </td>
                         </tr>
                         <tr>
                              <td>Button Text</td>
                              <td>{{ $banner->button_text }}</td>
                         </tr>
                         <tr>
                              <td>Link</td>
                              <td>{{ $banner->link }}</td>
                         </tr>
                         <tr>
                              <td>Status</td>
                              <td>
                                   @if( $banner->is_active == true )
                                        <span class="badge badge-success">Active</span>
                                   @else
                                        <span class="badge badge-danger">Inactive</span>
                                   @endif
                              </td>
                         </tr>
                         <tr>
                              <td>Created Date & Time</td>
                              <td>{{ $banner->created_at->toDayDateTimeString() }}</td>
                         </tr>
                         <tr>
                              <td>Last Update</td>
                              <td>{{ $banner->updated_at->toDayDateTimeString() }}</td>
                         </tr>
                    </tbody>
               </table>
          </div>
     </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
