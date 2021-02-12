<style>
    @media only screen and (min-width: 600px) {
    #mybar {
    background-color: #0E4D92;
  },

  #brandSleep {
    color: white;
  }

}

@media only screen and (max-width: 600px) {
  #brandSleep {
    color: black;
  }

}

#firstslide{
    background-image: url("/slides-resource/50-OFF-choose-day-Mobile-category--Banner-11th-Feb-2019.jpg");
    background-position: right;
    background-repeat: no-repeat;
    background-size: auto;
}

#secondslide{
    background-image: url("/slides-resource/Nightsuits-Banner-901-by-519-27th-Sep-2016-848x477.jpg");
    background-position: right;
    background-repeat: no-repeat;
    background-size: auto;
}
#thirdslide{
    background-image: url("/slides-resource/sleepwear_shorts_cat_mob_07_04.jpg");
    background-position: right;
    background-repeat: no-repeat;
    background-size: auto;
}
</style>
<section id="mybar" class = "py-4 shadow">
  <nav class="container navbar navbar-expand-lg navbar-dark">
    <a class="text-lg text-white text-decoration-none" href="/">
        {{-- <img class="w-40" src="{{ asset('slides-resource/Yamaha-logo.png') }}" alt=""> --}}
        <h3 class=" font-weight-bold" id="brandSleep">SLEEPWEAR</h3>
    </a>
    <div class="ml-8 collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="mr-auto navbar-nav ">
        @auth
          @if(Auth::user()->role === 'admin' && Auth::user()->verified === 1)
            <li class="nav-item active">
              <a class="text-white nav-link" href="/dashboard" tabindex="-1" aria-disabled="true">Dashboard</a>
            </li>
          @endif
          @if(Auth::user()->role !== 'admin')
            <li class="nav-item active">
                <a class="text-white nav-link" href="/my-account" tabindex="-1" aria-disabled="true">My Account</a>
            </li>
          @endif
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

<div id="carouselExampleSlidesOnly" class="container hidden pr-2 mt-2 carousel slide md:block" data-ride="carousel">
  <div class="carousel-inner">
    <div class="pr-2 carousel-item active" style="background-color: #008ECC;" id="firstslide">
      <div class="container py-5 " >
        <h1 class="text-white capitalize font-weight-bold display-4">SleepWear</h1>
        <p class="text-white lead">
            “No day is so bad it can’t be fixed with a nap.” <br> — Carrie Snow, American Stand-Up Comic
        </p>
      </div>
    </div>
    <div class="carousel-item" style="background-color: #008ECC;" id="secondslide">
      <div class="container py-5">
        <h1 class="text-white capitalize font-weight-bold display-4">SleepWear</h1>
        <p class="text-white lead">
            I love sleep. My life has the tendency to fall <br> apart when I’m awake, you know?” — Ernest Hemingway, American Author
        </p>
      </div>
    </div>
    <div class="carousel-item " style="background-color: #008ECC;" id="thirdslide">
      <div class="container py-5">
        <h1 class="text-white capitalize font-weight-bold display-4">SleepWear</h1>
        <p class="text-white lead">
            Happiness is waking up, looking at the clock and <br> finding that you still have two hours left to sleep.” <br> — Charles M. Schulz, American Cartoonist
        </p>
      </div>
    </div>
     <div class="carousel-item" style="background-color: #008ECC;" id="secondslide">
      <div class="container py-5">
        <h1 class="text-white capitalize font-weight-bold display-4">SleepWear</h1>
        <p class="text-white lead">
            A good laugh and a long sleep are <br> the best cures in the doctor's book.
        </p>
      </div>
    </div>
  </div>
</div>


@include('pages.web-app.home.components.side-bar-slide')
