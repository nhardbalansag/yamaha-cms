
<section style  = "background-color: #1b3295" class = "py-4 bg-black">
  <nav class="navbar navbar-expand-lg navbar-dark">
    <a class="font-extrabold h1 text-decoration-none text-primary" href="/">YAMAHA</a>
    <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="text-white navbar-toggler-icon"></span>
    </button>

    <div class="ml-8 collapse navbar-collapse " id="navbarSupportedContent">
      <ul class="mr-auto navbar-nav ">
        <li class="nav-item dropdown active">
            <a class="text-xl text-white nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Model
            </a>
            <div class="w-full dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li>
          <li class="nav-item dropdown active">
          <a class="text-xl text-white nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Promos
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
        <li class="nav-item active">
          <a class="text-xl text-white nav-link" href="#">Service <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
          <a class="text-xl text-white nav-link" href="#">Parts</a>
        </li>
        
        <li class="nav-item active">
          <a class="text-xl text-white nav-link" href="#" tabindex="-1" aria-disabled="true">Contact Us</a>
        </li>
        @auth
          @if(Auth::user()->role === 'admin' && Auth::user()->verified === 1)
            <li class="nav-item active">
              <a class="text-xl text-white nav-link" href="/dashboard" tabindex="-1" aria-disabled="true">Dashboard</a>
            </li>
          @elseif(Auth::user()->role === 'customer' && Auth::user()->verified === 1)
            <li class="nav-item active">
              <a class="text-xl text-white nav-link" href="/my-account/{{Auth::user()->id}}" tabindex="-1" aria-disabled="true">My Account</a>
            </li>
          @endif
            <li class="nav-item active">
             <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a  class="text-xl text-white nav-link" aria-disabled="true" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                    {{ __('Logout') }}
                </a>
              </form>
            </li>
        @else
          <li class="nav-item active">
            <a class="text-xl text-white nav-link" href="/customer/register" tabindex="-1" aria-disabled="true">Register</a>
          </li>
          <li class="nav-item active">
            <a class="text-xl text-white nav-link" href="/customer/login" tabindex="-1" aria-disabled="true">Login</a>
          </li>
        @endif
      </ul>
    </div>
  </nav>
</section>
{{-- <div class="jumbotron jumbotron-fluid bg-dark">
  <div class="container">
    <h1 class="text-white capitalize display-4">megavia</h1>
    <p class="text-white lead">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laborum enim eligendi voluptas</p>
  </div>
</div> --}}

<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active bg-dark">
      <div class="container py-4">
        <h1 class="text-white capitalize display-4">megavia</h1>
        <p class="text-white lead">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laborum enim eligendi voluptas</p>
      </div>
    </div>
    <div class="carousel-item bg-dark">
      <div class="container py-4">
        <h1 class="text-white capitalize display-4">motorcycles</h1>
        <p class="text-white lead">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laborum enim eligendi voluptas</p>
      </div>
    </div>
    <div class="carousel-item bg-dark">
      <div class="container py-4">
        <h1 class="text-white capitalize display-4">parts</h1>
        <p class="text-white lead">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laborum enim eligendi voluptas</p>
      </div>
    </div>
     <div class="carousel-item bg-dark">
      <div class="container py-4">
        <h1 class="text-white capitalize display-4">mantainance and services</h1>
        <p class="text-white lead">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laborum enim eligendi voluptas</p>
      </div>
    </div>
    
  </div>
</div>



<div class="modal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Modal body text goes here.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<script>
$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
$(function() { alert("shortcut for document.ready method in jQuery"); });
hello();
function hello(){
  alert()
}
</script>