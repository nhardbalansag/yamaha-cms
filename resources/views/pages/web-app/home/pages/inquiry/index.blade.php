@extends('welcome')
@section('home-contents')

 @livewire('home.inquire', ['productId' => $product->id])

@endsection