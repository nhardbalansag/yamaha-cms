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
@if(count($products) <= 0)
    <div class="d-flex justify-content-center">
        <div class="text-center">
            <i class="fas fa-box-open fa-10x"></i>
            <p class="capitalize">no items to show</p>
        </div>
    </div>
@else
@foreach($products as $key => $value)

    <div class="py-2 my-2 text-center border-bottom border-dark row col-md-12">
        <div class="col-md-2 text-truncate">
            <a class="text-truncate text-primary" href="{{asset('storage/' . $value->photo_path) }}">
                <img class="w-20" src="{{asset('storage/' . $value->photo_path) }}" alt="">
            </a>
        </div>
        <div class="col-md-2">
            {{$value->title}}
        </div>
        <div class="col-md-1">
            <p class="p-1 capitalize {{ $value->status == 'pending' ? 'text-warning' : 'text-success' }} ">
                {{$value->status}}
            </p>
        </div>
        <div class="col-md-1">
            {{$value->categoryTitle }}
        </div>
        <div class="col-md-2">
            {{$value->price }}
        </div>
        <div class="col-md-2">
            {{ $value->created_at }}
        </div>
        <div class=" col-md-2">
            <a href="/product/view/{{ $value->id }}" class="text-indigo-600 hover:text-indigo-900">view</a>
        </div>
    </div>
@endforeach
<div>
    {!! $products->links() !!}
</div>
@endif

@endsection
