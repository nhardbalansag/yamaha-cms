

<div class="pt-4 mt-10 sm:mt-0">
    <div class="">
        <div class="md:col-span-1">
            <div class="px-4 sm:px-0">
                <h3 class="text-lg font-medium leading-6 text-gray-900 capitalize"> Edit Product </h3>
            </div>
        </div>
        <div class="mt-5 md:mt-0 md:col-span-2">
        <div>
            @if (session()->has('message'))
                <div class="container capitalize alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
        </div>
            <form wire:submit.prevent="updateProduct" enctype="multipart/form-data">
                <div class="sm:rounded-md sm:overflow-hidden">
                    <div class="grid grid-cols-1 px-4 py-5 bg-white sm:p-6">
                        <div >
                            <div>
                                <div class="w-1/2 py-2 my-4">
                                    <label for="company_website" class="block text-sm font-medium leading-5 text-gray-700 capitalize">
                                    product price
                                    </label>
                                    <div class="flex mt-1 rounded-md shadow-sm">
                                    <span class="inline-flex items-center px-3 text-sm text-gray-500 border border-r-0 border-gray-300 rounded-l-md bg-gray-50">
                                    Price
                                    </span>
                                    <input value="{{$this->price = $productData->price }}" wire:model.defer='price' id="company_website" class="flex-1 block w-full text-xl transition duration-150 ease-in-out rounded-none form-input rounded-r-md sm:leading-5">
                                    </div>
                                    @error('price') <span class="italic text-red-600 error">{{ $message }}</span> @enderror
                                </div>
                                <div class="my-4">
                                    <div class="">
                                        <label for="company_website" class="block text-sm font-medium leading-5 text-gray-700 capitalize">
                                        product name
                                        </label>
                                        <div class="flex mt-1 rounded-md shadow-sm">
                                        <span class="inline-flex items-center px-3 text-sm text-gray-500 border border-r-0 border-gray-300 rounded-l-md bg-gray-50">
                                        Title
                                        </span>
                                        <input value='{{ $this->title = $productData->title }}' wire:model.defer='title' id="company_website" class="flex-1 block w-full text-xl transition duration-150 ease-in-out rounded-none form-input rounded-r-md">
                                        </div>
                                        @error('title') <span class="italic text-red-600 error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="my-2">
                                    <label for="about" class="block text-sm font-medium leading-5 text-gray-700 capitalize">
                                        product Description
                                    </label>
                                    <div class="rounded-md shadow-sm">
                                        <textarea value='{{ $this->description = $productData->description }}'  wire:model.defer="description" id="about" rows="3" class="block w-full mt-1 transition duration-150 ease-in-out form-textarea sm:text-sm sm:leading-5" placeholder="description here"></textarea>
                                    </div>
                                    @error('description') <span class="italic text-red-600 error">{{ $message }}</span> @enderror
                                    <p class="mt-2 text-sm text-gray-500 ">
                                        Brief description for your product.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="px-4 py-3 text-right bg-gray-50 sm:px-6">
                        <span class="inline-flex rounded-md shadow-sm">
                            <button class="btn btn-dark">Edit Product</button>
                        </span>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div wire:loading>
        @include('pages.components.loadingState')
    </div>
</div>


