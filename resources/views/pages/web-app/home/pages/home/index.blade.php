@extends('welcome')
@section('home-contents')

    @livewire('home.navigation-search')
    @include('pages.web-app.home.components.recommended')

@endsection
