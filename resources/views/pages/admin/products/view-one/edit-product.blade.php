@extends('dashboard')
@section('contents')
    @livewire('admin.product.product-edit', ['DBproduct_id' => $product->id])
@endsection
