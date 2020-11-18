<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>yamaha | web app</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

        @livewireStyles

        <!-- Styles -->
    </head>
    <body class="antialiased">
        @livewire('home.navigation-bar')
        <div class="relative flex items-top justify-center min-h-screen bg-white dark:bg-gray-900 sm:items-center sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-xl text-gray-700 underline">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-xl text-white underline">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-xl text-white underline">Register</a>
                        @endif
                    @endif
                </div>
            @endif
            {{--  --}}
            <div class = "grid grid-cols-1 md:flex w-4/5 m-auto ">
                {{-- side search --}}
                @livewire('home.navigation-search')  
                {{-- end side search --}}
                <div class = "p-4 w-full md:w-4/5"> 
                    {{-- top sort --}}
                        @livewire('home.top-sort')  
                    {{-- end top sort --}}

                    {{-- contents --}}
                        @yield('home-contents')
                    {{-- end contents --}}
                </div>
            </div>
            {{--  --}}
        </div>
         <footer class="container py-5">
            @include('pages.web-app.home.components.footer')
        </footer>
         @livewireScripts   
         <script src= "{{mix('js/app.js')}}"></script>
        <!-- jQuery and JS bundle w/ Popper.js -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    </body>
</html>
