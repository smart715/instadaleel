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
                                        All Business
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

                                   <form action="{{ route('business.all') }}" method="get">
                                        @csrf
                                        <div class="row">
                                             <div class="col-md-2">
                                                  <label>Search</label>
                                                  <input type="search" class="form-control" name="search" value="{{ $search }}" >                                              
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
                                                  <th>Image</th>
                                                  <th>Name</th>
                                                  <th>Code</th>
                                                  <th>Active</th>
                                                  <th>Pinned</th>
                                                  <th>Status</th>
                                                  <th>Action</th>
                                             </tr>
                                        </thead>
                                        <tbody>
                                             @foreach( $businesses as $key => $business )
                                             <tr>
                                                  <td>{{ $key + 1 }}</td>
                                                  <td>
                                                       <a data-fancybox='gallery' href="{{ asset('images/business/'. $business->image) }}">
                                                            <img src="{{ asset('images/business/'. $business->image) }}" width='50px' >
                                                       </a>
                                                  </td>
                                                  <td>{{ $business->name }}</td>
                                                  <td>{{ $business->code }}</td>
                                                  <td>
                                                       @if( $business->is_active == true )
                                                       <span class="badge badge-success">
                                                            Active
                                                       </span>
                                                       @else
                                                       <span class="badge badge-danger">
                                                            Inactive
                                                       </span>
                                                       @endif
                                                  </td>
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
                                                  <td>{{ $business->status }}</td>
                                                  <td>
                                                       <div class="dropdown">
                                                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdown-{{ $business->id }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                 Action
                                                            </button>
                                                            <div class="dropdown-menu" aria-labelledby="dropdown-{{ $business->id }}">
                                        
                                                                 @if( can("edit_business") )
                                                                 <a class="dropdown-item" href="#" data-content="{{ route('business.edit.modal', encrypt($business->id)) }}" data-target="#myModal" class="btn btn-outline-dark" data-toggle="modal">
                                                                      <i class="fas fa-edit"></i>
                                                                      Edit
                                                                 </a>
                                                                 @endif

                                                                 @if( can("delete_business") )
                                                                 <a class="dropdown-item" href="#" data-content="{{ route('business.delete.modal', encrypt($business->id)) }}" data-target="#myModal" class="btn btn-outline-dark" data-toggle="modal">
                                                                      <i class="fas fa-trash"></i>
                                                                      Delete
                                                                 </a>
                                                                 @endif

                                                                 @if( can("view_business") )
                                                                 <a class="dropdown-item" href="#" data-content="{{ route('business.view.modal', encrypt($business->id)) }}" data-target="#myModal" class="btn btn-outline-dark" data-toggle="modal">
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
                                             {{ $businesses->links() }}
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