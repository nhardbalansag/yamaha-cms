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

            <hr>
            <h4>Available Colors</h4>
            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                <label class="btn btn-default text-center active">
                    <input type="radio" name="color_option" id="color_option1" autocomplete="off" checked="">
                    Green
                    <br>
                    <i class="fas fa-circle fa-2x text-green"></i>
                </label>
                <label class="btn btn-default text-center">
                    <input type="radio" name="color_option" id="color_option2" autocomplete="off">
                    Blue
                    <br>
                    <i class="fas fa-circle fa-2x text-blue"></i>
                </label>
                <label class="btn btn-default text-center">
                    <input type="radio" name="color_option" id="color_option3" autocomplete="off">
                    Purple
                    <br>
                    <i class="fas fa-circle fa-2x text-purple"></i>
                </label>
                <label class="btn btn-default text-center">
                    <input type="radio" name="color_option" id="color_option4" autocomplete="off">
                    Red
                    <br>
                    <i class="fas fa-circle fa-2x text-red"></i>
                </label>
                <label class="btn btn-default text-center">
                    <input type="radio" name="color_option" id="color_option5" autocomplete="off">
                    Orange
                    <br>
                    <i class="fas fa-circle fa-2x text-orange"></i>
                </label>
            </div>
            <div class="col-span-3 sm:col-span-3 w-1/2 my-2">
                <label for="country" class="block text-xl font-medium leading-5 text-gray-700">Status</label>
                <select wire:model.prevent ="status" id="country" class="mt-1 block form-select w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out text-xl">
                    <option>Select Status</option>
                    <option value = "publish" >Publish</option>
                    <option value = "pending" >Pending</option>
                </select>
                @error('status') <span class="error text-red-600 italic">{{ $message }}</span> @enderror
            </div>
            <div class="bg-gray py-2 px-3 mt-4">
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

    @livewire('admin.product.create-specification', ['product_id' => $product->id])

    @livewire('admin.product.color-category',  ['product_id' => $product->id])
     
    <div class="row mt-4">
        <nav class="w-100">
            <div class="nav nav-tabs" id="product-tab" role="tablist">
            <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Description</a>
            <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">Specification</a>
            </div>
        </nav>
        <div class="tab-content p-3" id="nav-tabContent">
            <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab"> 
                {{$product->description}}
            </div>
            <div class="tab-pane fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab"> Vivamus rhoncus nisl sed venenatis luctus. Sed condimentum risus ut tortor feugiat laoreet. Suspendisse potenti. Donec et finibus sem, ut commodo lectus. Cras eget neque dignissim, placerat orci interdum, venenatis odio. Nulla turpis elit, consequat eu eros ac, consectetur fringilla urna. Duis gravida ex pulvinar mauris ornare, eget porttitor enim vulputate. Mauris hendrerit, massa nec aliquam cursus, ex elit euismod lorem, vehicula rhoncus nisl dui sit amet eros. Nulla turpis lorem, dignissim a sapien eget, ultrices venenatis dolor. Curabitur vel turpis at magna elementum hendrerit vel id dui. Curabitur a ex ullamcorper, ornare velit vel, tincidunt ipsum. 
            </div>
        </div>
    </div>
</div>

@endsection