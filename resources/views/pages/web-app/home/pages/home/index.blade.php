@extends('welcome')
@section('home-contents')

@livewire('home.top-sort')

<div class="row col-12-col-md-12">
    <div class="col-12 col-md-2">
        @livewire('home.navigation-search')
    </div>
    <div class="col-12 col-md-9 ">
        @include('pages.web-app.home.components.recommended')
        <div class="p-0 mx-auto row col-12 col-md-12">
            @foreach($product as $key => $value)
                <div class="my-4 col-6 col-md-3">
                    <a href="/home/product/{{$value->id}}">
                        <div class="p-0"  style="height:75%; width:100%">
                            <img src="{{url('storage/' . $value->photo_path) }}"  class="image-fluid" loading="lazy" alt="...">
                        </div>
                        <div>
                            <div class="mb-2 truncate w-100 font-weight-bold text-primary text-capitalize">{{$value->title}}</div>
                            <div class="font-weight-light text-dark ">{{date('m/d/Y', strtotime($value->created_at))}}</div>
                            <div class="d-flex justify-content-between">
                                <p class="font-weight-light text-dark text-capitalize">buy now :</p>
                                <p class="font-weight-bold text-dark ">P {{number_format($value->price)}}.00</p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>

@endsection
