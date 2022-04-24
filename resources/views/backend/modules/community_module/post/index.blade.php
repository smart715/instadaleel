@extends("backend.template.layout")

@section('per_page_css')
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
                                        All Post
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

                                   <form action="{{ route('post.all') }}" method="get">
                                        @csrf
                                        <div class="row">
                                             <div class="col-md-2">
                                                  <label>Approved Status</label>
                                                  <select name="is_approved" class="form-control" required>
                                                       <option value="All" @if( $is_approved == 'All' ) selected @endif >All</option>
                                                       <option value="1" @if( $is_approved == '1' ) selected @endif >Approved</option>
                                                       <option value="0" @if( $is_approved == '0' ) selected @endif >Not Approved</option>
                                                  </select>                                               
                                             </div>
                                             <div class="col-md-2">
                                                  <label>Shown Status</label>
                                                  <select name="is_shown" class="form-control" required>
                                                       <option value="All"  @if( $is_shown == 'All' ) selected @endif >All</option>
                                                       <option value="1"  @if( $is_shown == '1' ) selected @endif >Shown</option>
                                                       <option value="0"  @if( $is_shown == '0' ) selected @endif >Not Shown</option>
                                                  </select>                                               
                                             </div>
                                             <div class="col-md-2">
                                                  <label>Date</label>
                                                  <input type="date" class="form-control" name="date" value="{{ $date }}" >                                              
                                             </div>
                                             <div class="col-md-2">
                                                  <label>Search</label>
                                                  <input type="search" class="form-control" name="search" value="{{ $search }}" >                                              
                                             </div>
                                             <div class="col-md-4">
                                                  <button type="submit" class="btn btn-success mt-4">
                                                       Search
                                                  </button>     
                                                  <a href="{{ route('post.all') }}" class="btn btn-danger mt-4">
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
                                                            <td>Description</td>
                                                            <td>Is Approved</td>
                                                            <td>Is Shown</td>
                                                            <td>Total Like</td>
                                                            <td>Total Comment</td>
                                                            <td>Date</td>
                                                            <td>Action</td>
                                                       </tr>
                                                  </thead>

                                                  <tbody>
                                                       @forelse( $posts as $key => $post )
                                                       <tr>
                                                            <td>{{ $key + 1 }}</td>
                                                            <td>{{ Str::limit($post->description,30) }}</td>
                                                            <td>
                                                                 @if( $post->is_approved == true )
                                                                      <span class="badge badge-success">Approved</span>
                                                                 @else
                                                                      <span class="badge badge-danger">Not Approved</span>
                                                                 @endif
                                                            </td>
                                                            <td>
                                                                 @if( $post->is_shown == true )
                                                                      <span class="badge badge-success">Yes</span>
                                                                 @else
                                                                      <span class="badge badge-danger">No</span>
                                                                 @endif
                                                            </td>
                                                            <td>{{ $post->total_like }}</td>
                                                            <td>{{ $post->total_comment }}</td>
                                                            <td>{{ $post->created_at->toDayDateTimeString() }}</td>
                                                            <td>
                                                                 <div class="dropdown">
                                                                      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdown-{{ $post->id }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                           Action
                                                                      </button>
                                                                      <div class="dropdown-menu" aria-labelledby="dropdown-{{ $post->id }}">
                                                  
                                                                           @if( can("edit_post") )
                                                                           <a class="dropdown-item" href="#" data-content="{{ route('post.edit.modal', encrypt($post->id)) }}" data-target="#myModal" class="btn btn-outline-dark" data-toggle="modal">
                                                                                <i class="fas fa-edit"></i>
                                                                                Edit
                                                                           </a>
                                                                           @endif

                                                                           @if( can("delete_post") )
                                                                           <a class="dropdown-item" href="#" data-content="{{ route('post.delete.modal', encrypt($post->id)) }}" data-target="#myModal" class="btn btn-outline-dark" data-toggle="modal">
                                                                                <i class="fas fa-trash"></i>
                                                                                Delete
                                                                           </a>
                                                                           @endif

                                                                           @if( can("view_post") )
                                                                           <a class="dropdown-item" href="#" data-content="{{ route('post.view.modal', encrypt($post->id)) }}" data-target="#myModal" class="btn btn-outline-dark" data-toggle="modal">
                                                                                <i class="fas fa-eye"></i>
                                                                                View
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
                                                       {{ $posts->links() }}
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


@endsection