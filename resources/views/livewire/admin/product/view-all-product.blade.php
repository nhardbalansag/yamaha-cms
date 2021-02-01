@extends('dashboard')
@section('contents')

<div class="my-4 text-center border-bottom border-dark row col-md-12 text-capitalize">
    <div class="col-md-2">
        image
    </div>
    <div class="col-md-2">
        title
    </div>
    <div class="col-md-1">
        status
    </div>
    <div class="col-md-1">
        category
    </div>
    <div class="col-md-2">
        price
    </div>
    <div class="col-md-2">
        date created
    </div>
</div>
@foreach($products as $key => $value)

    <div class="py-2 my-2 text-center border-bottom border-dark row col-md-12">
        <div class="col-md-2 text-truncate">
            <a class="text-truncate text-primary" href="{{asset('storage/' . $value->products_photo_path) }}">
                <img class="w-20" src="{{asset('storage/' . $value->products_photo_path) }}" alt="">
            </a>
        </div>
        <div class="col-md-2">
            {{$value->products_title}}
        </div>
        <div class="col-md-1">
            <span class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">
                {{$value->products_status}}
            </span>
        </div>
        <div class="col-md-1">
            {{$value->categoryTitle }}
        </div>
        <div class="col-md-2">
            {{$value->products_price }}
        </div>
        <div class="col-md-2">
            {{ $value->products_created_at }}
        </div>
        <div class=" col-md-2">
            <a class="dropdown-item text-primary" href="/product/view/{{ $value->products_id }}" class="text-indigo-600 hover:text-indigo-900">view</a>
        </div>
    </div>
@endforeach

@endsection
