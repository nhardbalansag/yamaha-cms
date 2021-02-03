<div class="mt-4 mb-10 md:mb-0">
    <div class="mx-auto mt-2 row col-12 d-flex justify-content-end">
        <div class="p-0 col-md-6 col-12">
            <div class="p-0 mb-3 input-group">
                <input wire:model.defer="topSearch"  type="text" class=" form-control" placeholder="Search" aria-label="Recipient's username" aria-describedby="button-addon2">
                <button wire:click="searchProduct" class="btn btn-primary" type="submit" id="button-addon2">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </button>
            </div>
        </div>
    </div>
    <div class="row col-12-col-md-12">
        <div class="col-12 col-md-2">
            <div class = "block mb-5 bg-white rounded collapse d-md-block" id="search">
                <form wire:submit.prevent="sortProduct">
                    <div class="py-2 mb-2 text-sm text-center text-white bg-primary alert ">
                        <p class = "capitalize">search product</p>
                    </div>
                    <div class="mb-6">
                        <div class="">
                            <label for="sortBy" class="block text-sm font-medium leading-5 text-gray-700">Sort</label>
                            <select wire:model="sortBy" id="sortBy" class="block w-full p-2 px-3 py-2 mt-1 transition duration-150 ease-in-out bg-white border-gray-400 border-solid rounded-md shadow-sm border-1 form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5">
                                <option value="title" >- Sort By -</option>
                                <option value="title">Name</option>
                                <option value="price">Price</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-6">
                        <div class="">
                            <label for="orderBy" class="block text-sm font-medium leading-5 text-gray-700">Order By</label>
                            <select wire:model="orderBy" id="orderBy" class="block w-full p-2 px-3 py-2 mt-1 transition duration-150 ease-in-out bg-white border-gray-400 border-solid rounded-md shadow-sm border-1 form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5">
                                <option value="ASC">- Order By -</option>
                                <option value="ASC">Ascending</option>
                                <option value="DESC">Descending</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-6">
                        <div class="">
                            <label for="productCategory" class="block text-sm font-medium leading-5 text-gray-700">Category</label>
                            <select wire:model="productCategory"  id="productCategory" class="block w-full p-2 px-3 py-2 mt-1 transition duration-150 ease-in-out bg-white border-gray-400 border-solid rounded-md shadow-sm border-1 form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5">
                                <option value="">Select Category</option>
                                @foreach($category as $key => $value)
                                    <option value="{{ $value->id }}">{{ $value->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class = "text-center ">
                        <button class="w-full btn btn-dark">Search product</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-12 col-md-10 ">
            <div class="col-12">
                @if (session()->has('message'))
                    <div class="container text-center capitalize alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
            </div>
            <div class="p-0 mx-auto row col-12 col-md-12">
                <div class="col-12">
                    <p class = "text-lg font-bold capitalize">All Products ({{ count($product) }})</p>
                </div>
                @foreach($product as $key => $value)
                    <div class="my-4 col-6 col-md-3">
                        <a href="/home/product/{{$value->id}}">
                            <div class="p-0"  style=" width:100%">
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
    <div wire:loading>
        @include('pages.components.loadingState')
   </div>
</div>
