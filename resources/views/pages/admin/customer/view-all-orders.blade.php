@extends('dashboard')
@section('contents')

<div class="my-4 text-center border-bottom border-dark row col-md-12 text-capitalize">
    <div class="col-md-1">
        customer
    </div>
    <div class="col-md-2">
        product
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
@if(count($transactions) <= 0)
    <div class="d-flex justify-content-center">
        <div class="text-center">
            <i class="fas fa-box-open fa-10x"></i>
            <p class="capitalize">no items to show</p>
        </div>
    </div>
@else
@foreach($transactions as $key => $value)

    <div class="py-2 my-2 text-center border-bottom border-dark row col-md-12">
        <div class="col-md-1 text-truncate">
            {{$value->first_name}}
        </div>
        <div class="col-md-2 ">
            {{$value->title}}
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
            <a  href="/orders/viewallOrders/transactions/{{ $value->id }}" class="text-indigo-600 hover:text-indigo-900">view</a>
        </div>
    </div>

@endforeach
<div>
    {!! $transactions->links() !!}
</div>
@endif

@endsection
