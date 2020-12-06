<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>yamaha | web app</title>
        {{-- recaptcha --}}
        <script src='https://www.google.com/recaptcha/api.js'></script>
        {{-- icons --}}
        <link rel="stylesheet" type="text/css" href="asset/fa/fontAwesome/css/all.css">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

        @livewireStyles

        <!-- Styles -->
    </head>
    <body>
        @livewire('home.navigation-bar')
        <div class="w-full m-auto md:container">
            {{-- @if (Route::has('login'))
                <div class="fixed top-0 right-0 hidden px-6 py-4 sm:block">
                    @auth
                        @if(Auth::user()->role === 'admin')
                            <a href="{{ url('/dashboard') }}" class="text-xl text-gray-700 underline">Dashboard</a>
                        @endif
                    @endauth
                </div>
            @endif --}}
            {{--  --}}
            <div class="pt-3 m-auto row col-12 col-md-12">
                <div class="p-0 md:mr-5 col-12 col-md-2">
                    {{-- search --}}
                    @livewire('home.navigation-search')
                </div> 
                <div class="p-0 col-12 col-md-9">
                    {{-- content --}}
                    {{-- top sort --}}
                        @livewire('home.top-sort')  
                    {{-- end top sort --}}

                    {{-- contents --}}
                        @yield('home-contents')
                    {{-- end contents --}}
                </div> 
            </div> 
        </div>
                <div id="fb-root"></div>
                <script>
                    window.fbAsyncInit = function() {
                    FB.init({
                        xfbml            : true,
                        version          : 'v9.0'
                    });
                    };

                    (function(d, s, id) {
                    var js, fjs = d.getElementsByTagName(s)[0];
                    if (d.getElementById(id)) return;
                    js = d.createElement(s); js.id = id;
                    js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
                    fjs.parentNode.insertBefore(js, fjs);
                    }(document, 'script', 'facebook-jssdk'));
                </script>

                <!-- Your Chat Plugin code -->
                <div class="fb-customerchat"
                    attribution=setup_tool
                    page_id="105158801438012"
                    theme_color="#20cef5"
                    logged_in_greeting="Hi! How can we help you this is only for capstone project"
                    logged_out_greeting="Hi! How can we help you this is only for capstone project">
                </div>
         <footer class="container py-5">
            @include('pages.web-app.home.components.footer')
        </footer>
         @livewireScripts   
         <script src= "{{mix('js/app.js')}}"></script>
        <!-- jQuery and JS bundle w/ Popper.js -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    
        <div id="fb-root"></div>
        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v9.0" nonce="ufOIooEq"></script>
        <!-- facebook messgenge -->
                
    </body>

</html>
