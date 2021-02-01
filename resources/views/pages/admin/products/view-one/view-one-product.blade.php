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
                @livewire('admin.product.update-product-status', ['product_id' => $product->id])
            <div class="px-3 py-2 mt-4 bg-gray">
                <h2 class="mb-0">
                    ₱{{number_format($product->price)}}
                </h2>
                <h4 class="mt-0">
                    <small>Price: ₱{{$product->price}} </small>
                </h4>
            </div>
            <div>
                @livewire('admin.product.update-product-inventory-count', ['product_id' => $product->id])
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
                <div class="col-12">
                    <div class="row col-12">
                        <div class="col-6">
                            <p class="text-capitalize font-weight-bold">specifications</p>
                        </div>
                        <div class="col-6 text-capitalize font-weight-bold">
                            <p>description</p>
                        </div>
                    </div>
                    @foreach($product_specifications as $key => $value)
                        <div class="row col-12 border-bottom">
                            <div class="col-6">
                                <p class="text-muted">{{$value->title}}</p>
                            </div>
                            <div class="col-6">
                                <p class="text-muted"> {{$value->description}}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="tab-pane fade" id="product-specification" role="tabpanel" aria-labelledby="product-comments-tab">
                @livewire('admin.product.create-specification', ['product_id' => $product->id])
            </div>
        </div>
    </div>
</div>

@endsection


