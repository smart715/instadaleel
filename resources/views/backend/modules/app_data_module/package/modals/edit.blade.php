<div class="modal-header">
     <h5 class="modal-title" id="exampleModalLabel">{{ $package->title }}</h5>
     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
     </button>
</div>

<div class="modal-body">
     <form class="ajax-form" method="post" action="{{ route('package.edit',encrypt($package->id)) }}">
          @csrf

          <div class="row">

               <!-- Title -->
               <div class="col-md-6 col-12 form-group">
                    <label>Title</label><span class="require-span">*</span>
                    <input type="text" class="form-control" name="title" value="{{ $package->title }}">
               </div>
               
               <!-- Duration Days -->
               <div class="col-md-6 col-12 form-group">
                    <label>Duration Days</label><span class="require-span">*</span>
                    <input type="number" min="1" class="form-control" name="duration_days" value="{{ $package->duration_days }}">
               </div>

               <!-- Price -->
               <div class="col-md-6 col-12 form-group">
                    <label>Price</label><span class="require-span">*</span>
                    <input type="number" min="1" class="form-control" name="price" value="{{ $package->price }}">
               </div>
               
               <!-- Select Status -->
               <div class="col-md-6 col-12 form-group">
                    <label>Select Status</label><span class="require-span">*</span>
                    <select class="form-control" name="is_active">
                         <option value="1" @if( $package->is_active == true ) selected @endif >Active
                         </option>
                         <option value="0" @if( $package->is_active == false ) selected @endif >Inactive
                         </option>
                    </select>
               </div>

               <div class="col-md-12 form-group text-right">
                    <button type="submit" class="btn btn-outline-dark">
                         Update
                    </button>
               </div>


          </div>
     </form>
</div>
<div class="modal-footer">
     <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>




