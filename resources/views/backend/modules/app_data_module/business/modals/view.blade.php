<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Business Code : {{ $business->code }}</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<div class="modal-body">
     <div class="row">
          <div class="col-sm-12">
               <table class="table table-bordered table-sm">
                    <tbody>

                         <!-- business information -->
                         <tr>
                              <td colspan="2" class="text-center">
                                   <strong>Business Information</strong>
                              </td>
                         </tr>
                         <tr>
                              <td>Image</td>
                              <td><img src="{{ asset('images/business/'. $business->image) }}" width='50px' ></td>
                         </tr>
                         <tr>
                              <td>Name</td>
                              <td>{{ $business->business_name }}</td>
                         </tr>
                         <tr>
                              <td>Email</td>
                              <td>{{ $business->email }}</td>
                         </tr>
                         <tr>
                              <td>Contact Number</td>
                              <td>{{ $business->contact_number }}</td>
                         </tr>
                         <tr>
                              <td>Address</td>
                              <td>{{ $business->address }}</td>
                         </tr>
                         <tr>
                              <td>Short Description</td>
                              <td>{{ $business->short_description }}</td>
                         </tr>
                         <tr>
                              <td>Rating</td>
                              <td>{{ $business->rating }}</td>
                         </tr>
                         <tr>
                              @php
                                   $social_links = json_decode($business->social_links);
                              @endphp
                              <td>Social Links</td>
                              <td>
                                   <ul>
                                        @foreach( $social_links as $key => $link )
                                        <li>
                                             <strong> <a href="{{ $link->instagram_link}}" target="blank" >Instagram </a> </strong>
                                        </li>
                                        <li>
                                             <strong> <a href="{{ $link->twitter_link}}" target="blank" >Twitter </a> </strong>
                                        </li>
                                        <li>
                                             <strong> <a href="{{ $link->facebook_link}}" target="blank" >Facebook </a> </strong>
                                        </li>
                                        <li>
                                             <strong> <a href="{{ $link->youtube_link}}" target="blank" >Youtube </a> </strong>
                                        </li>
                                        <li>
                                             <strong> <a href="{{ $link->telegram_link}}" target="blank" >Telegram </a> </strong>
                                        </li>
                                        @endforeach
                                   </ul>
                              </td>
                         </tr>
                         <tr>
                              <td>Website Link</td>
                              <td>{{ $business->website_link }}</td>
                         </tr>
                         <tr>
                              <td>Office Hour</td>
                              <td>{{ $business->office_hour }}</td>
                         </tr>
                         <tr>
                              <td>Active Status</td>
                              <td>
                                   @if( $business->is_active == true )
                                        <span class="badge badge-success">Active</span>
                                   @else
                                        <span class="badge badge-danger">Inactive</span>
                                   @endif
                              </td>
                         </tr>
                         <tr>
                              <td>Pinned</td>
                              <td>
                                   @if( $business->is_pinned == true )
                                        <span class="badge badge-success">
                                             Pinnded
                                        </span>
                                   @else
                                        <span class="badge badge-danger">
                                             Not Pinnded
                                        </span>
                                   @endif
                              </td>
                         </tr>
                         <tr>
                              <td>Status</td>
                              <td>{{ $business->status }}</td>
                         </tr>
                         
                         <tr>
                              <td>Created Date & Time</td>
                              <td>{{ \Carbon\Carbon::parse($business->created_at)->toDayDateTimeString() }}</td>
                         </tr>
                         <tr>
                              <td>Last Update</td>
                              <td>{{ \Carbon\Carbon::parse($business->updated_at)->toDayDateTimeString() }}</td>
                         </tr>
                         <!-- business information end -->

                         <!-- customer information -->
                         <tr>
                              <td colspan="2" class="text-center">
                                   <strong>Customer Information</strong>
                              </td>
                         </tr>
                         <tr>
                              <td>Name</td>
                              <td>{{ $business->customer_name }}</td>
                         </tr>
                         <tr>
                              <td>Email</td>
                              <td>{{ $business->customer_email }}</td>
                         </tr>
                         <tr>
                              <td>Phone</td>
                              <td>{{ $business->customer_phone }}</td>
                         </tr>
                         <!-- customer information end -->


                         <!-- Location information -->
                         <tr>
                              <td colspan="2" class="text-center">
                                   <strong>Location Information</strong>
                              </td>
                         </tr>
                         <tr>
                              <td>Location</td>
                              <td>{{ $business->location_name }}</td>
                         </tr>



                    </tbody>
               </table>
          </div>
     </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
