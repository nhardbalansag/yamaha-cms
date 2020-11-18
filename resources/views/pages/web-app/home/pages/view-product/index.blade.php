@extends('welcome')
@section('home-contents')
    
    <section>
        <div class="grid grid-cols-1 lg:grid-cols-2">
            <div class="mx-2 mb-5 bg-white rounded">
                <a href="/home//product/{{$product->id}}/inquiry">
                    <img src="{{asset('storage/' . $product->photo_path) }}"  alt="product">
                </a>
                <div class="mt-2">
                    <h5 class="truncate">{{$product->title}}</h5>
                    <p>SRP: <span>{{$product->price}}</span></p>
                    <div class = "grid grid-cols-1 md:grid-cols-2">
                        <div>
                            <a href="/home/product/{{$product->id}}/inquiry" class="btn btn-outline-primary" role="button" aria-pressed="true">inquire</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class = "capitalize">
                <div class = "bg-blue-900 text-center">
                    <p class="text-white font-extrabold text-4xl">SRP: ₱{{$product->price}}</p>
                </div>
                <div>
                    <table class="table-auto">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">specifications</th>
                                <th class="px-4 py-2">description</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($specification as $key => $value)
                                <tr>
                                    <td class="border px-4 py-2 font-bold">{{$value->title}}</td>
                                    <td class="border px-4 py-2">
                                       {{$value->description}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        @include('pages.web-app.home.components.recommended')

    </section>
     
@endsection