<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Customer Details</h5>
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
                              <td>customer Image</td>
                              <td>
                                   @if( $customer->image )
                                        <a data-fancybox='gallery' href="{{ asset('images/customer/'. $customer->image) }}">
                                             <img src="{{ asset('images/customer/'. $customer->image) }}" width="50px" alt="">
                                        </a>
                                   @else
                                        <img src="{{ asset('images/profile/user.png') }}" width="50px" alt="">
                                   @endif
                              </td>
                         </tr>
                         <tr>
                              <td>Name</td>
                              <td>{{ $customer->name }}</td>
                         </tr>
                         <tr>
                              <td>Email</td>
                              <td>{{ $customer->email }}</td>
                         </tr>
                         <tr>
                              <td>Phone</td>
                              <td>{{ $customer->phone }}</td>
                         </tr>
                         <tr>
                              <td>Gender</td>
                              <td>{{ $customer->gender }}</td>
                         </tr>
                         <tr>
                              <td>Occupation</td>
                              <td>{{ $customer->occupation ?? 'N/A' }}</td>
                         </tr>
                         <tr>
                              <td>About</td>
                              <td>{{ $customer->about ?? 'N/A' }}</td>
                         </tr>
                         <tr>
                              <td>Address</td>
                              <td>{{ $customer->address ?? 'N/A' }}</td>
                         </tr>
                         <tr>
                              <td>OTP Verified</td>
                              <td>
                                   @if( $customer->is_otp_verified == true )
                                        <span class="badge badge-success">Verified</span>
                                   @else
                                        <span class="badge badge-danger">Not Verified</span>
                                   @endif
                              </td>
                         </tr>
                         <tr>
                              <td>Active Status</td>
                              <td>
                                   @if( $customer->is_active == true )
                                        <span class="badge badge-success">Active</span>
                                   @else
                                        <span class="badge badge-danger">Not Active</span>
                                   @endif
                              </td>
                         </tr>
                         <tr>
                              <td>Created Date & Time</td>
                              <td>{{ $customer->created_at->toDayDateTimeString() }}</td>
                         </tr>
                         <tr>
                              <td>Last Update</td>
                              <td>{{ $customer->updated_at->toDayDateTimeString() }}</td>
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