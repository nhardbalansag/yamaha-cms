@extends('welcome')
@section('home-contents')

@livewire('customer.resubmit-document', ["customersDocumentInfo" => $passId->id])

@endsection
