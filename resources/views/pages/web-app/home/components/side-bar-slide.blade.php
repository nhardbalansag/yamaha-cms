<style>

.modal.right .modal-dialog {
    position: fixed;
    margin: auto;
    width: 80%;
    height: 100%;
    -webkit-transform: translate3d(0%, 0, 0);
        -ms-transform: translate3d(0%, 0, 0);
         -o-transform: translate3d(0%, 0, 0);
            transform: translate3d(0%, 0, 0);
}

.modal.right .modal-content {
    height: 100%;
    overflow-y: auto;
}

.modal.right .modal-body {
    padding: 15px 15px 80px;
}


/*Right*/
.modal.right.fade .modal-dialog {
    right: -30px;
    -webkit-transition: opacity 0.3s linear, right 0.3s ease-out;
       -moz-transition: opacity 0.3s linear, right 0.3s ease-out;
         -o-transition: opacity 0.3s linear, right 0.3s ease-out;
            transition: opacity 0.3s linear, right 0.3s ease-out;
}

.modal.right.fade.in .modal-dialog {
    right: 0;
}

</style>
<!-- Modal -->
<div class="container">
  <div class="modal right fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
    <div class="modal-dialog" role="document">
      <div class="text-left modal-content">
        @auth
          <div class="modal-header d-flex justify-content-between align-items-center">
            <a data-value="User Account" data-header="User Account" >
              <span  class="capitalize h6 text-secondary font-weight-bold">{{Auth::user()->first_name}}'s account</span>
            </a>

          </div>
        @endauth
        <div class="modal-header d-flex flex-column justify-content-left align-items-left">
          <a class="my-2" data-disable="true" data-value="My Buying" data-header="My Buying" href="#">
            <span class="h6 text-dark font-weight-bold">My Account</span>
          </a>
          <a  @auth href="/my-account" @endauth class="my-2" href="/customer/login">
            <span class="h6 text-dark">Order</span>
          </a>
          <a class="my-2" @auth href="/my-account"  @endauth href="/customer/login">
            <span class="h6 text-dark">Reserve</span>
          </a>
        </div>
        <div class="modal-header d-flex flex-column justify-content-left align-items-left">
          <a class="my-2" data-disable="true" data-value="My Buying" data-header="My Buying" href="#">
            <span class="h6 text-dark font-weight-bold">Explore</span>
          </a>
          <a href="/" class="my-2" >
            <span class="h6 text-dark">Parts</span>
          </a>
           <a href="/my-account" class="my-2" >
            <span class="h6 text-dark">Service</span>
          </a>
        </div>
        <div class="modal-header d-flex flex-column justify-content-left align-items-left">
          @auth
            @if(Auth::user()->role === 'admin')
                <a class="my-2" href="/dashboard">
                    <span class="h6 text-dark font-weight-bold">User Account</span>
                </a>
            @elseif(Auth::user()->role === 'customer')
                <a class="my-2" href="/my-account">
                    <span class="h6 text-dark font-weight-bold">User Account</span>
                </a>
            @endif
          @endauth
          @guest
          <div class="col-12">
              <div class="my-2 text-center col-11">
                <a href="/customer/login" class="m-auto text-lg btn btn-primary w-100 font-weight-bold text-uppercase">Login</a>
              </div>
              <div class="my-2 text-center col-11">
                <a href="/customer/register" class="m-auto text-lg btn btn-light text-primary w-100 font-weight-bold text-uppercase" > Sign Up</a>
              </div>
            </div>
          @endguest

        </div>
        @auth
          <div class="mt-2 col-12">
              <div class="my-2 text-center col-11">
                <form class="form-logout" action="{{ route('logout') }}" method="POST">
                @csrf
                  <a class="m-auto text-lg text-white btn btn-primary col-12 w-100 app-logout font-weight-bold text-uppercase"
                    onclick="event.preventDefault();
                    this.closest('form').submit();">
                    Sign out
                  </a>
                </form>
              </div>
          </div>
        @endauth
      </div>
    </div>
  </div>
</div>
