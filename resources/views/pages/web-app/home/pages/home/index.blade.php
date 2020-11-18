@extends('welcome')
@section('home-contents')

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 mb-4">
        @foreach($product as $key => $value)
 
            <div class="m-2 mb-5 rounded flex justify-center">
                <div>
                    <div class=" w-full">
                        <a href="/home/product/{{$value->id}}">
                            <img class="w-64 h-48" src="{{asset('storage/' . $value->photo_path) }}"  alt="product photo">
                        </a>
                    </div>
                    <div class="mt-2">
                        <h5 class="truncate">{{$value->title}}</h5>
                        <p>SRP: <span>{{$value->price}}</span></p>
                        <a href="/home/product/{{$value->id}}" class="btn btn-outline-primary btn-lg w-full" role="button" aria-pressed="true">View Details</a>
                    </div>
                </div>
            </div>
               
        @endforeach
    </div>

@endsection