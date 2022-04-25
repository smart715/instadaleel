<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">offer Title : {{ $offer->title }}</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<div class="modal-body">
     <div class="row">
          <div class="col-sm-12">
               <table class="table table-bordered table-sm">
                    <tbody>

                         <!-- offer information -->
                         <tr>
                              <td colspan="2" class="text-center">
                                   <strong>offer Information</strong>
                              </td>
                         </tr>
                         <tr>
                              <td>Image</td>
                              <td><img src="{{ asset('images/offer/'. $offer->image) }}" width='50px' ></td>
                         </tr>
                         <tr>
                              <td>Title</td>
                              <td>{{ $offer->title }}</td>
                         </tr>
                         <tr>
                              <td>Description</td>
                              <td>{{ $offer->description }}</td>
                         </tr>
                         <tr>
                              <td>Approved Status</td>
                              <td>
                                   @if( $offer->is_approved == true )
                                        <span class="badge badge-success">Approved</span>
                                   @else
                                        <span class="badge badge-danger">Not Approved</span>
                                   @endif
                              </td>
                         </tr>
                         <tr>
                              <td>Active Status</td>
                              <td>
                                   @if( $offer->is_active == true )
                                        <span class="badge badge-success">Active</span>
                                   @else
                                        <span class="badge badge-danger">Inactive</span>
                                   @endif
                              </td>
                         </tr>
                         
                         <tr>
                              <td>Created Date & Time</td>
                              <td>{{ \Carbon\Carbon::parse($offer->created_at)->toDayDateTimeString() }}</td>
                         </tr>
                         <tr>
                              <td>Last Update</td>
                              <td>{{ \Carbon\Carbon::parse($offer->updated_at)->toDayDateTimeString() }}</td>
                         </tr>
                         <!-- offer information end -->

                         <!-- customer information -->
                         <tr>
                              <td colspan="2" class="text-center">
                                   <strong>Customer Information</strong>
                              </td>
                         </tr>
                         <tr>
                              <td>Name</td>
                              <td>{{ $offer->customer->name }}</td>
                         </tr>
                         <tr>
                              <td>Email</td>
                              <td>{{ $offer->customer->email }}</td>
                         </tr>
                         <tr>
                              <td>Phone</td>
                              <td>{{ $offer->customer->phone }}</td>
                         </tr>
                         <!-- customer information end -->


                         <!-- Business information -->
                         <tr>
                              <td colspan="2" class="text-center">
                                   <strong>Business Information</strong>
                              </td>
                         </tr>
                         <tr>
                              <td>Business</td>
                              <td>{{ $offer->business->name }}</td>
                         </tr>
                         <tr>
                              <td>Business Code</td>
                              <td>{{ $offer->business->code }}</td>
                         </tr>
                         <!-- Business information end -->


                    </tbody>
               </table>
          </div>
     </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
