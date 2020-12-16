<style>
    @media only screen and (min-width: 600px) {
    #mybar {
    background-color: #1b3295;
  }
}

#firstslide{
    background-image: url("/slides-resource/motor3.png");
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}

#secondslide{
    background-image: url("/slides-resource/Untitled-1.png");
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}
#thirdslide{
    background-image: url("/slides-resource/motor4000x600.png");
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}
</style>
<section id="mybar" class = "py-4 shadow">
  <nav class="container navbar navbar-expand-lg navbar-dark">
    <a class="text-lg text-white text-decoration-none" href="/">
        <img class="w-40" src="{{ asset('slides-resource/Yamaha-logo.png') }}" alt="">
    </a>
    {{-- <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="text-white navbar-toggler-icon"></span>
    </button> --}}

    <div class="ml-8 collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="mr-auto navbar-nav ">
        <li class="nav-item active">
            <a class="text-white nav-link" href="#">Motorcycle <span class="sr-only">(current)</span></a>
          </li>
        <li class="nav-item active">
          <a class="text-white nav-link" href="#" tabindex="-1" aria-disabled="true">Contact us</a>
        </li>
        @auth
          @if(Auth::user()->role === 'admin' && Auth::user()->verified === 1)
            <li class="nav-item active">
              <a class="text-white nav-link" href="/dashboard" tabindex="-1" aria-disabled="true">Dashboard</a>
            </li>
          @endif
            <li class="nav-item active">
              <a class="text-white nav-link" href="/my-account/{{Auth::user()->id}}" tabindex="-1" aria-disabled="true">My Account</a>
            </li>
            <li class="nav-item active">
             <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a  class="text-white nav-link" aria-disabled="true" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                    {{ __('Logout') }}
                </a>
              </form>
            </li>
        @endauth
        @guest
          <li class="nav-item active">
            <a class="text-white nav-link" href="/customer/register" tabindex="-1" aria-disabled="true">Register</a>
          </li>
          <li class="nav-item active">
            <a class="text-white nav-link" href="/customer/login" tabindex="-1" aria-disabled="true">Login</a>
          </li>
        @endguest
      </ul>
    </div>
    <div class="d-flex justify-content-center d-md-none">
        <a data-toggle="modal" data-target="#myModal2" >
          @auth
            <svg class="w-6 mx-2 text-black md:text-white"  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
          </svg>
          @endauth
          @guest
            <svg class="w-6 mx-2 text-black md:text-white"  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
          @endguest

        </a>
         <a href="" data-toggle="collapse"  data-target="#search">
          <svg class="w-6 mx-2 text-black md:text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
          </svg>
        </a>
    </div>
  </nav>
</section>
{{-- <div class="jumbotron jumbotron-fluid bg-dark">
  <div class="container">
    <h1 class="text-white capitalize display-4">megavia</h1>
    <p class="text-white lead">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laborum enim eligendi voluptas</p>
  </div>
</div> --}}

<div id="carouselExampleSlidesOnly" class="hidden carousel slide md:block" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active" id="firstslide">
      <div class="container py-4 " >
        <h1 class="text-white capitalize display-4">megavia</h1>
        <p class="text-white lead">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laborum enim eligendi voluptas</p>
      </div>
    </div>
    <div class="carousel-item" id="secondslide">
      <div class="container py-4">
        <h1 class="text-white capitalize display-4">motorcycles</h1>
        <p class="text-white lead">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laborum enim eligendi voluptas</p>
      </div>
    </div>
    <div class="carousel-item bg-dark" id="thirdslide">
      <div class="container py-4">
        <h1 class="text-white capitalize display-4">parts</h1>
        <p class="text-white lead">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laborum enim eligendi voluptas</p>
      </div>
    </div>
     <div class="carousel-item" id="secondslide">
      <div class="container py-4">
        <h1 class="text-white capitalize display-4">mantainance and services</h1>
        <p class="text-white lead">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laborum enim eligendi voluptas</p>
      </div>
    </div>
  </div>
</div>


@include('pages.web-app.home.components.side-bar-slide')
