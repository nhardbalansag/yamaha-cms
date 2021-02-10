@extends('dashboard')
@section('contents')
    @livewire('admin.product.specification-edit', ['specsID' => $specifications->id, 'productID' => $specifications->product_id])
@endsection
