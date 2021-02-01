@extends('dashboard')
@section('contents')
<div>
    @if (session()->has('message'))
        <div class="container capitalize alert alert-success">
            {{ session('message') }}
        </div>
    @endif
</div>
<div class="my-4 text-center border-bottom border-dark row col-md-12 text-capitalize">
    <div class="col-md-1">
        customer ID
    </div>
    <div class="col-md-2">
        product ID
    </div>
    <div class="col-md-2">
        purchase amount
    </div>
    <div class="col-md-3">
        status
    </div>
    <div class="col-md-2">
        created at
    </div>
    <div class="col-md-2">
        action
    </div>
</div>
@foreach($transactions as $key => $value)

    <div class="py-2 my-2 text-center border-bottom border-dark row col-md-12">
        <div class="col-md-1 text-truncate">
            {{$value->customerId}}
        </div>
        <div class="col-md-2 ">
            {{$value->productId}}
        </div>
        <div class="col-md-2">
            {{$value->purchaseAmount }}
        </div>
        <div class="col-md-3">
            {{$value->status }}
        </div>
        <div class="col-md-2">
            {{$value->created_at }}
        </div>
        <div class=" col-md-2">
            <div class="mb-2 dropdown">
                <a class="dropdown-toggle " data-toggle="dropdown" href="#" >Actions</a>
                <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                    <li>
                        <a class="dropdown-item text-primary" href="/orders/viewallOrders/transactions/{{ $value->id }}" class="text-indigo-600 hover:text-indigo-900">view</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endforeach

@endsection
