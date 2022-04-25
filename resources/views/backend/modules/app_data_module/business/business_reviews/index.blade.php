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
                              <li class="breadcrumb-item">
                                   <a href="{{ route('business.all') }}">
                                        All Business
                                   </a>
                              </li>
                              <li class="breadcrumb-item active">
                                   <a href="#">
                                        {{ $business->code }}
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
                              <div class="card-body">

                                   <form action="{{ route('business.view.review.all',encrypt($business->id)) }}" method="get">
                                        @csrf
                                        <div class="row">
                                             <div class="col-md-2">
                                                  <label>Search</label>
                                                  <input type="search" class="form-control" name="search" value="{{ $search }}" placeholder="Customer Name" >                                              
                                             </div>
                                             <div class="col-md-2">
                                                  <label>Star</label>
                                                  <select name="star" class="form-control">
                                                       <option value="All" @if( $star == "All" ) selected @endif >All</option>
                                                       <option value="1" @if( $star == "1" ) selected @endif >1 Star</option>
                                                       <option value="2" @if( $star == "2" ) selected @endif >2 Star</option>
                                                       <option value="3" @if( $star == "3" ) selected @endif >3 Star</option>
                                                       <option value="4" @if( $star == "4" ) selected @endif >4 Star</option>
                                                       <option value="5" @if( $star == "5" ) selected @endif >5 Star</option>
                                                  </select>                                              
                                             </div>
                                             <div class="col-md-2">
                                                  <label>Date</label>
                                                  <input type="date" class="form-control" name="date" value="{{ $date }}" >                                              
                                             </div>
                                             <div class="col-md-4">
                                                  <button type="submit" class="btn btn-success mt-4">
                                                       Search
                                                  </button>                                  
                                             </div>
                                        </div>
                                   </form>

                                   <table class="table table-bordered table-striped dataTable dtr-inline custom-datatable mt-4" id="datatable">
                                        <thead>
                                             <tr>
                                                  <th>ID</th>
                                                  <th>Customer</th>
                                                  <th>Rating</th>
                                                  <th>Date</th>
                                                  <th>Approve Status</th>
                                                  <th>Shown Status</th>
                                                  <th>Action</th>
                                             </tr>
                                        </thead>
                                        <tbody>
                                             @forelse( $business_reviews as $key => $business_review )
                                             <tr>
                                                  <td>{{ $key + 1 }}</td>
                                                  <td>{{ $business_review->customer->name }}</td>
                                                  <td>{{ $business_review->rating }} Star</td>
                                                  <td>{{ $business_review->created_at->toDayDateTimeString() }}</td>
                                                  <td>
                                                       @if( $business_review->is_approved == true )
                                                            <span class="badge badge-success">Approved</span>
                                                       @else
                                                            <span class="badge badge-danger">Not Approved</span>
                                                       @endif
                                                  </td>
                                                  <td>
                                                       @if( $business_review->is_shown == true )
                                                            <span class="badge badge-success">Shown</span>
                                                       @else
                                                            <span class="badge badge-danger">Not Shown</span>
                                                       @endif
                                                  </td>
                                                  <td>
                                                       <div class="dropdown">
                                                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdown-{{ $business_review->id }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                 Action
                                                            </button>
                                                            <div class="dropdown-menu" aria-labelledby="dropdown-{{ $business_review->id }}">

                                                                 @if( can("view_business_review") )
                                                                 <a class="dropdown-item" href="#" data-content="{{ route('business.review.view', encrypt($business_review->id)) }}" data-target="#myModal" class="btn btn-outline-dark" data-toggle="modal">
                                                                      <i class="fas fa-eye"></i>
                                                                      View
                                                                 </a>
                                                                 @endif

                                                                 @if( can("delete_business_review") )
                                                                 <a class="dropdown-item" href="#" data-content="{{ route('business.review.delete.modal', encrypt($business_review->id)) }}" data-target="#myModal" class="btn btn-outline-dark" data-toggle="modal">
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
                                                  <td colspan="8" class="text-center">
                                                       No Data Found
                                                  </td>
                                             </tr>                                          
                                             @endforelse
                                        </tbody>
                                        <tfoot>
                                             {{ $business_reviews->links() }}
                                        </tfoot>
                                   </table>
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