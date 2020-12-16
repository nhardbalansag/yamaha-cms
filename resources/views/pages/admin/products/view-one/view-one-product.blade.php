@extends('dashboard')
@section('contents')

<div class="card-body">
    <div class="row">
        <div class="col-12 col-sm-6">
            <h3 class="d-inline-block d-sm-none">{{$product->title}}</h3>
            <div class="col-12">
            <img src="{{asset('storage/' . $product->photo_path) }}" class="product-image" alt="Product Image">
            </div>
        </div>
        <div class="col-12 col-sm-6">
            <h3 class="my-3">{{$product->title}}</h3>
            <p>{{$product->description}}</p>
            <div class="w-1/2 col-span-3 my-2 sm:col-span-3">
                <label for="country" class="block text-xl font-medium leading-5 text-gray-700">Status</label>
                <select wire:model.prevent ="status" id="country" class="block w-full px-3 py-2 mt-1 text-xl transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md shadow-sm form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300">
                    <option>Select Status</option>
                    <option value = "publish" >Publish</option>
                    <option value = "pending" >Pending</option>
                </select>
                @error('status') <span class="italic text-red-600 error">{{ $message }}</span> @enderror
            </div>
            <div class="px-3 py-2 mt-4 bg-gray">
                <h2 class="mb-0">
                    {{$product->price}}
                </h2>
                <h4 class="mt-0">
                    <small>Price:{{$product->price}} </small>
                </h4>
            </div>
            <div class="mt-4 product-share">
                <a href="#" class="text-gray">
                    <i class="fab fa-facebook-square fa-2x"></i>
                </a>
                <a href="#" class="text-gray">
                    <i class="fab fa-twitter-square fa-2x"></i>
                </a>
                <a href="#" class="text-gray">
                    <i class="fas fa-envelope-square fa-2x"></i>
                </a>
                <a href="#" class="text-gray">
                    <i class="fas fa-rss-square fa-2x"></i>
                </a>
            </div>

        </div>
    </div>




    <div class="mt-4 row">
        <nav class="w-100">
            <div class="nav nav-tabs" id="product-tab" role="tablist">
            <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Description</a>
            <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">Specification</a>
              <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-specification" role="tab" aria-controls="product-comments" aria-selected="false">Add Specification</a>
            </div>
        </nav>
        <div class="w-full p-3 tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">
                {{$product->description}}
            </div>
            <div class="tab-pane fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab">
            all sepecification
            </div>
            <div class="tab-pane fade" id="product-specification" role="tabpanel" aria-labelledby="product-comments-tab">
                @livewire('admin.product.create-specification', ['product_id' => $product->id])
            </div>
        </div>
    </div>
</div>

@endsection
