@extends('welcome')
@section('home-contents')

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 mb-4">
        @foreach($product as $key => $value)
 
            <div class="m-2 shadow p-3 mb-5 bg-white rounded">
                <a href="product/{{$value->id}}">
                    <img src="{{asset('storage/' . $value->photo_path) }}"  alt="product photo">
                </a>
                <div class="mt-2">
                    <h5 class="truncate">{{$value->title}}</h5>
                    <p>SRP: <span>{{$value->price}}</span></p>
                    <a href="/home/product/{{$value->id}}" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">View Details</a>
                </div>
            </div>
               
        @endforeach
    </div>

@endsection