<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel"> {{ $country->name }}</h5>
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
                              <td>Name</td>
                              <td>{{ $country->name }}</td>
                         </tr>
                         <tr>
                              <td>Image</td>
                              <td>
                                   <img src="{{ asset('images/country/'. $country->image) }}" width="50px">
                              </td>
                         </tr>
                         <tr>
                              <td>Status</td>
                              <td>
                                   @if( $country->is_active == true )
                                        <span class="badge badge-success">Active</span>
                                   @else
                                        <span class="badge badge-danger">Inactive</span>
                                   @endif
                              </td>
                         </tr>
                         <tr>
                              <td>Created Date & Time</td>
                              <td>{{ $country->created_at->toDayDateTimeString() }}</td>
                         </tr>
                         <tr>
                              <td>Last Update</td>
                              <td>{{ $country->updated_at->toDayDateTimeString() }}</td>
                         </tr>
                    </tbody>
               </table>
          </div>
     </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
