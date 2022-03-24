<div class="container">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header">Click here to go to reset password link</div>
                    <div class="card-body">
                     @if (session('resent'))
                          <div class="alert alert-success" role="alert">
                             {{ __('A fresh verification link has been sent to your email address.') }}
                         </div>
                     @endif
                     <a href="{{ url('/reset-password/'.$token.'/'.$email) }}">Click Here</a>
                 </div>
             </div>
         </div>
     </div>
  </div>