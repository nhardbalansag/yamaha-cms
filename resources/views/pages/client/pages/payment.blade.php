
@extends('welcome')
@section('home-contents')
  @livewire('customer.payment', [ "data" => $data ])
@endsection