@extends("backend.template.layout")

@section('per_page_css')
<link rel="stylesheet" href="{{ asset('backend/css/fancybox/fencybox.min.css') }}">
@endsection

@section('body-content')
<div class="content-wrapper" style="min-height: 147px;">

     <!-- Content Header (Page header) -->
     <div class="content-header">
          <div class="container-fluid">
               <div class="row">
                    <div class="col-sm-6">
                         <ol class="breadcrumb float-sm-left">
                              <li class="breadcrumb-item">
                                   <a href="{{ route('dashboard') }}">
                                        Dashboard
                                   </a>
                              </li>
                              <li class="breadcrumb-item active">
                                   <a href="#">
                                        All customer
                                   </a>
                              </li>
                         </ol>
                    </div><!-- /.col -->
               </div><!-- /.row -->
          </div><!-- /.container-fluid -->
     </div>
     <!-- /.content-header -->

     <section class="content">
          <div class="container-fluid">

               <div class="row">
                    <div class="col-md-12">
                         <div class="card card-primary card-outline table-responsive">

                              <div class="card-header text-right">
                                   @if( can('add_customer') )
                                   <button type="button" data-content="{{ route('customer.add.modal') }}" data-target="#myModal" class="btn btn-outline-dark" data-toggle="modal">
                                        Add
                                   </button>
                                   @endif
                              </div>
                              <div class="card-body">

                                   <form action="{{ route('customer.all') }}" method="get">
                                        @csrf
                                        <div class="row">
                                             <div class="col-md-2">
                                                  <label>Search</label>
                                                  <input type="search" class="form-control" name="search" value="{{ $search }}">
                                             </div>
                                             <div class="col-md-2">
                                                  <label>OTP Verified</label>
                                                  <select name="is_otp_verified" class="form-control">
                                                       <option value="All" @if( $is_otp_verified == "All" ) selected @endif >All</option>
                                                       <option value="1" @if( $is_otp_verified == "1" ) selected @endif >Verified</option>
                                                       <option value="0" @if( $is_otp_verified == "0" ) selected @endif >Not Verified</option>
                                                  </select>
                                             </div>
                                             <div class="col-md-2">
                                                  <label>Active Status</label>
                                                  <select name="is_active" class="form-control">
                                                       <option value="All" @if( $is_active == "All" ) selected @endif >All</option>
                                                       <option value="1" @if( $is_active == "1" ) selected @endif >Active</option>
                                                       <option value="0" @if( $is_active == "0" ) selected @endif >In active</option>
                                                  </select>
                                             </div>
                                             <div class="col-md-4">
                                                  <button type="submit" class="btn btn-success mt-4">
                                                       Search
                                                  </button>     
                                                  <a href="{{ route('customer.all') }}" class="btn btn-danger mt-4">
                                                       Refresh
                                                  </a>                                       
                                             </div>
                                        </div>
                                   </form>
                                   
                                   <div class="row mt-3">
                                        <div class="col-md-12 table-responsive">
                                             <table class="table table-striped">
                                                  <thead>
                                                       <tr>
                                                            <td>SI</td>
                                                            <td>Image</td>
                                                            <td>Name</td>
                                                            <td>Phone</td>
                                                            <td>Email</td>
                                                            <td>Otp Verified</td>
                                                            <td>Is Active</td>
                                                            <td>Online Status</td>
                                                            <td>Action</td>
                                                       </tr>
                                                  </thead>

                                                  <tbody>
                                                       @forelse( $customers as $key => $customer )
                                                       <tr>
                                                            <td>{{ $key + 1 }}</td>
                                                            <td>
                                                                 @if( $customer->image )
                                                                      <a data-fancybox='gallery' href="{{ asset('images/customer/'. $customer->image) }}">
                                                                           <img src="{{ asset('images/customer/'. $customer->image) }}" width="50px" alt="">
                                                                      </a>
                                                                 @else
                                                                      <img src="{{ asset('images/profile/user.png') }}" width="50px" alt="">
                                                                 @endif
                                                            </td>
                                                            <td>{{ $customer->name }}</td>
                                                            <td>{{ $customer->phone }}</td>
                                                            <td>{{ $customer->email }}</td>
                                                            <td>
                                                                 @if( $customer->is_otp_verified == true )
                                                                      <span class="badge badge-success">Verified</span>
                                                                 @else
                                                                      <span class="badge badge-danger">Not Verified</span>
                                                                 @endif
                                                            </td>
                                                            <td>
                                                                 @if( $customer->is_active == true )
                                                                      <span class="badge badge-success">Active</span>
                                                                 @else
                                                                      <span class="badge badge-danger">Not Active</span>
                                                                 @endif
                                                            </td>
                                                            <td>
                                                                 @if( \Carbon\Carbon::now()->toDateString() == \Carbon\Carbon::parse($customer->last_active)->toDateString() )
                                                                      @if( date("H:i",strtotime($customer->last_active)) == date("H:i",strtotime(\Carbon\Carbon::now())) )
                                                                      <span class="badge badge-success">Online</span>
                                                                      @else
                                                                      <span class="badge badge-danger">Last Seen Today at {{ date("H:i",strtotime($customer->last_active)) }}</span>
                                                                      @endif
                                                                 @else
                                                                      <span class="badge badge-danger">Last Seen {{ $customer->last_active }}</span>
                                                                 @endif
                                                            </td>
                                                            <td>
                                                                 <div class="dropdown">
                                                                      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdown-{{ $customer->id }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                           Action
                                                                      </button>
                                                                      <div class="dropdown-menu" aria-labelledby="dropdown-{{ $customer->id }}">
                                                  
                                                                           @if( can("view_customer") )
                                                                           <a class="dropdown-item" href="#" data-content="{{ route('customer.view.modal',encrypt($customer->id)) }}" data-target="#myModal" class="btn btn-outline-dark" data-toggle="modal">
                                                                                <i class="fas fa-eye"></i>
                                                                                View
                                                                           </a>
                                                                           @endif

                                                                           @if( can("delete_customer") )
                                                                           <a class="dropdown-item" href="#" data-content="{{ route('customer.delete.modal',encrypt($customer->id)) }}" data-target="#myModal" class="btn btn-outline-dark" data-toggle="modal">
                                                                                <i class="fas fa-trash"></i>
                                                                                Delete
                                                                           </a>
                                                                           @endif
                                                  
                                                                      </div>
                                                                 </div>
                                                            </td>
                                                       </tr>
                                                       @empty
                                                       <tr>
                                                            <td colspan="9" class="text-center">
                                                                 No Data Found
                                                            </td>
                                                       </tr>
                                                       @endforelse
                                                  </tbody>
                                                  <tfoot>
                                                       {{ $customers->links() }}
                                                  </tfoot>
                                             </table>
                                        </div>
                                   </div>
                              </div>
                         </div>

                    </div>
               </div>

          </div>
     </section>

</div>
@endsection

@section('per_page_js')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="{{ asset('backend/js/custom-script.min.js') }}"></script>
<script src="{{  asset('backend/js/ajax_form_submit.js') }}"></script>

<script src="{{ asset('backend/js/fancybox/active.js') }}"></script>
<script src="{{ asset('backend/js/fancybox/fency.js') }}"></script>
<script src="{{ asset('backend/js/fancybox/fencybox.min.js') }}"></script>
@endsection