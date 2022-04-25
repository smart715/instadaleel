<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">View Review</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<div class="modal-body">
     <div class="row">
          <div class="col-sm-12">
               <table class="table table-bordered table-sm">
                    <tbody>

                         <!-- business_review information -->
                         <tr>
                              <td colspan="2" class="text-center">
                                   <strong>Business review Information</strong>
                              </td>
                         </tr>
                         <tr>
                              <td>Rating</td>
                              <td>{{ $business_review->rating }} Star</td>
                         </tr>
                         <tr>
                              <td>Comment</td>
                              <td>{{ $business_review->comment }}</td>
                         </tr>
                         <tr>
                              <td>Active Status</td>
                              <td>
                                   @if( $business_review->is_active == true )
                                        <span class="badge badge-success">Active</span>
                                   @else
                                        <span class="badge badge-danger">Inactive</span>
                                   @endif
                              </td>
                         </tr>
                         <tr>
                              <td>Approve Status</td>
                              <td>
                                   @if( $business_review->is_approved == true )
                                        <span class="badge badge-success">
                                             Approved
                                        </span>
                                   @else
                                        <span class="badge badge-danger">
                                             Not Approved
                                        </span>
                                   @endif
                              </td>
                         </tr>
                         <tr>
                              <td>Created Date & Time</td>
                              <td>{{ \Carbon\Carbon::parse($business_review->created_at)->toDayDateTimeString() }}</td>
                         </tr>
                         <tr>
                              <td>Last Update</td>
                              <td>{{ \Carbon\Carbon::parse($business_review->updated_at)->toDayDateTimeString() }}</td>
                         </tr>
                         <!-- business_review information end -->

                         <!-- customer information -->
                         <tr>
                              <td colspan="2" class="text-center">
                                   <strong>Customer Information</strong>
                              </td>
                         </tr>
                         <tr>
                              <td>Name</td>
                              <td>{{ $business_review->customer->name }}</td>
                         </tr>
                         <tr>
                              <td>Email</td>
                              <td>{{ $business_review->customer->email }}</td>
                         </tr>
                         <tr>
                              <td>Phone</td>
                              <td>{{ $business_review->customer->phone }}</td>
                         </tr>
                         <!-- customer information end -->



                    </tbody>
               </table>
          </div>
     </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
