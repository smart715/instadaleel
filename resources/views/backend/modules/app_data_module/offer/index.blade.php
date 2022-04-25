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
                                        All Offer
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

                                   <form action="{{ route('offer.all') }}" method="get">
                                        @csrf
                                        <div class="row">
                                             <div class="col-md-2">
                                                  <label>Search</label>
                                                  <input type="search" class="form-control" name="search" value="{{ $search }}" >                                              
                                             </div>
                                             <div class="col-md-2">
                                                  <label>Approved Status</label>
                                                  <select name="is_approved" class="form-control" required>
                                                       <option value="All" @if( $is_approved == 'All' ) selected @endif >All</option>
                                                       <option value="1" @if( $is_approved == '1' ) selected @endif >Approved</option>
                                                       <option value="0" @if( $is_approved == '0' ) selected @endif >Not Approved</option>
                                                  </select>                                               
                                             </div>
                                             <div class="col-md-2">
                                                  <label>Active Status</label>
                                                  <select name="is_active" class="form-control" required>
                                                       <option value="All" @if( $is_active == 'All' ) selected @endif >All</option>
                                                       <option value="1" @if( $is_active == '1' ) selected @endif >Active</option>
                                                       <option value="0" @if( $is_active == '0' ) selected @endif >Not Active</option>
                                                  </select>                                               
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
                                                  <th>Position</th>
                                                  <th>Image</th>
                                                  <th>Title</th>
                                                  <th>Customer</th>
                                                  <th>Business Code</th>
                                                  <th>Approved Status</th>
                                                  <th>Status</th>
                                                  <th>Action</th>
                                             </tr>
                                        </thead>
                                        <tbody>
                                             @foreach( $offers as $key => $offer )
                                             <tr>
                                                  <td>{{ $offer->position }}</td>
                                                  <td>
                                                       <a data-fancybox='gallery' href="{{ asset('images/offer/'. $offer->image) }}">
                                                            <img src="{{ asset('images/offer/'. $offer->image) }}" width="50px">
                                                       </a>
                                                  </td>
                                                  <td>{{ $offer->title }}</td>
                                                  <td>{{ $offer->customer->name }}</td>
                                                  <td>{{ $offer->business->code }}</td>
                                                  <td>
                                                       @if( $offer->is_approved == true )
                                                            <span class="badge badge-success">Approved</span>
                                                       @else
                                                            <span class="badge badge-danger">Not Approved</span>
                                                       @endif
                                                  </td>
                                                  <td>
                                                       @if( $offer->is_active == true )
                                                            <span class="badge badge-success">Active</span>
                                                       @else
                                                            <span class="badge badge-danger">Not Active</span>
                                                       @endif
                                                  </td>
                                                  <td>
                                                       <div class="dropdown">
                                                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdown-{{ $offer->id }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                 Action
                                                            </button>
                                                            <div class="dropdown-menu" aria-labelledby="dropdown-{{ $offer->id }}">
                                        
                                                                 @if( can("edit_offer") )
                                                                 <a class="dropdown-item" href="#" data-content="{{ route('offer.edit.modal', encrypt($offer->id)) }}" data-target="#myModal" class="btn btn-outline-dark" data-toggle="modal">
                                                                      <i class="fas fa-edit"></i>
                                                                      Edit
                                                                 </a>
                                                                 @endif

                                                                 @if( can("delete_offer") )
                                                                 <a class="dropdown-item" href="#" data-content="{{ route('offer.delete.modal', encrypt($offer->id)) }}" data-target="#myModal" class="btn btn-outline-dark" data-toggle="modal">
                                                                      <i class="fas fa-trash"></i>
                                                                      Delete
                                                                 </a>
                                                                 @endif

                                                                 @if( can("view_offer") )
                                                                 <a class="dropdown-item" href="#" data-content="{{ route('offer.view.modal', encrypt($offer->id)) }}" data-target="#myModal" class="btn btn-outline-dark" data-toggle="modal">
                                                                      <i class="fas fa-eye"></i>
                                                                      View
                                                                 </a>
                                                                 @endif
                                        
                                                            </div>
                                                       </div>
                                                  </td>
                                             </tr>                                             
                                             @endforeach
                                        </tbody>
                                        <tfoot>
                                             {{ $offers->links() }}
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