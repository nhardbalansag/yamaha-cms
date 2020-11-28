@extends('welcome')
@section('home-contents')

  <section>
        <div>
            <nav>
                <div class="nav nav-tabs" id="product-tab" role="tablist">
                <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Account information</a>
                <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">Orders</a>
                <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-color" role="tab" aria-controls="product-comments" aria-selected="false">Reservations</a>
                <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-specification" role="tab" aria-controls="product-comments" aria-selected="false">Motor Loans</a>
                </div>
            </nav>
            <div class="w-full p-3 tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab"> 
                    {{-- {{$product->description}} --}}
                    @include('pages.client.component.profile')
                </div>
                <div class="tab-pane fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab"> 
                all sepecification
                </div>
                <div class="tab-pane fade" id="product-color" role="tabpanel" aria-labelledby="product-comments-tab">  
                    {{-- @livewire('admin.product.color-category',  ['product_id' => $product->id]) --}}
                    orders
                </div>
                <div class="tab-pane fade" id="product-specification" role="tabpanel" aria-labelledby="product-comments-tab">  
                    @include('pages.client.component.loan-application')
                </div>
            </div>
        </div>
    </section>
@endsection