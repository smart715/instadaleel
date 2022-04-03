@extends("backend.template.layout")

@section('per_page_css')
<link href="{{ asset('backend/css/datatable/jquery.dataTables.min.css') }}" rel="stylesheet">
<link href="{{ asset('backend/css/datatable/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
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
                                        All Event
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
                                   @if( can('add_event') )
                                   <button type="button" data-content="{{ route('event.add.modal') }}" data-target="#largeModal" class="btn btn-outline-dark" data-toggle="modal">
                                        Add
                                   </button>
                                   @endif
                              </div>
                              <div class="card-body">
                                   <table class="table table-bordered table-striped dataTable dtr-inline custom-datatable" id="datatable">
                                        <thead>
                                             <tr>
                                                  <th>Position</th>
                                                  <th>Image</th>
                                                  <th>Title</th>
                                                  <th>Date & Time</th>
                                                  <th>Status</th>
                                                  <th>Is approved</th>
                                                  <th>Action</th>
                                             </tr>
                                        </thead>
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

<script src="{{ asset('backend/js/datatable/jquery.validate.js') }}"></script>
<script src="{{ asset('backend/js/datatable/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('backend/js/datatable/dataTables.bootstrap4.min.js') }}"></script>

<script src="{{  asset('backend/js/ajax_form_submit.js') }}"></script>

<script>
     $(function() {
          $('.custom-datatable').DataTable({
               processing: true,
               serverSide: true,
               ajax: "{{ route('event.data') }}",
               columns: [{
                         data: 'position',
                         name: 'position'
                    },
                    {
                         data: 'image',
                         name: 'image'
                    },
                    {
                         data: 'title',
                         name: 'title'
                    },
                    {
                         data: 'date_time',
                         name: 'date_time'
                    },
                    {
                         data: 'is_active',
                         name: 'is_active'
                    },
                    {
                         data: 'is_approved',
                         name: 'is_approved'
                    },
                    {
                         data: 'action',
                         name: 'action',
                         orderable: false,
                    },
               ]
          });
     });
</script>
@endsection