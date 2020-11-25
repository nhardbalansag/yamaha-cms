
<section style  = "background-color: #1b3295" class = "bg-black py-4">
  <nav class="navbar navbar-expand-lg navbar-dark lg:container lg:mx-auto">
    <a class="font-extrabold h1 text-decoration-none text-primary" href="/">YAMAHA</a>
    <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon text-white"></span>
    </button>

    <div class="collapse navbar-collapse ml-8 " id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto ">
        <li class="nav-item dropdown active">
            <a class="nav-link dropdown-toggle text-xl text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Model
            </a>
            <div class="dropdown-menu w-full" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li>
          <li class="nav-item dropdown active">
          <a class="nav-link dropdown-toggle text-xl text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
          <a class="nav-link text-xl text-white" href="#">Service <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link text-xl text-white" href="#">Parts</a>
        </li>
        
        <li class="nav-item active">
          <a class="nav-link text-xl text-white" href="#" tabindex="-1" aria-disabled="true">Contact Us</a>
        </li>
        @auth
          @if(Auth::user()->role === "admin")
            <li class="nav-item active">
              <a class="nav-link text-xl text-white" href="/dashboard" tabindex="-1" aria-disabled="true">Dashboard</a>
            </li>
          @elseif(Auth::user()->role === "customer"){
            <li class="nav-item active">
              <a class="nav-link text-xl text-white" href="" tabindex="-1" aria-disabled="true">My Account</a>
            </li>
          }
          @endif
            
            <li class="nav-item active">
             <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a  class="nav-link text-xl text-white" aria-disabled="true" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                    {{ __('Logout') }}
                </a>
              </form>
            </li>
        @else
          <li class="nav-item active">
            <a class="nav-link text-xl text-white" href="/customer/register" tabindex="-1" aria-disabled="true">Register</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link text-xl text-white" href="/customer/login" tabindex="-1" aria-disabled="true">Login</a>
          </li>
        @endif
      </ul>
    </div>
  </nav>
</section>
{{-- <div class="jumbotron jumbotron-fluid bg-dark">
  <div class="container">
    <h1 class="display-4 capitalize text-white">megavia</h1>
    <p class="lead text-white">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laborum enim eligendi voluptas</p>
  </div>
</div> --}}

<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active bg-dark">
      <div class="container py-4">
        <h1 class="display-4 capitalize text-white">megavia</h1>
        <p class="lead text-white">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laborum enim eligendi voluptas</p>
      </div>
    </div>
    <div class="carousel-item bg-dark">
      <div class="container py-4">
        <h1 class="display-4 capitalize text-white">motorcycles</h1>
        <p class="lead text-white">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laborum enim eligendi voluptas</p>
      </div>
    </div>
    <div class="carousel-item bg-dark">
      <div class="container py-4">
        <h1 class="display-4 capitalize text-white">parts</h1>
        <p class="lead text-white">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laborum enim eligendi voluptas</p>
      </div>
    </div>
     <div class="carousel-item bg-dark">
      <div class="container py-4">
        <h1 class="display-4 capitalize text-white">mantainance and services</h1>
        <p class="lead text-white">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laborum enim eligendi voluptas</p>
      </div>
    </div>
    
  </div>
</div>