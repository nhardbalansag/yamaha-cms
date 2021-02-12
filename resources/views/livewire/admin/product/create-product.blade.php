


<div class="pt-4 mt-10 sm:mt-0">
    <div class="">
        <div class="md:col-span-1">
            <div class="px-4 sm:px-0">
                <h3 class="text-lg font-medium leading-6 text-gray-900 capitalize">  create your product </h3>
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
            <form wire:submit.prevent="createProduct" enctype="multipart/form-data">
                <div class="sm:rounded-md sm:overflow-hidden">
                    <label class="block ml-4 text-sm font-medium leading-5 text-gray-700 capitalize">
                        Upload product photo
                    </label>
                     <div>
                        <div>
                            <label class="w-1/4 px-4 py-2 ml-4 font-semibold text-gray-800 bg-white border border-gray-400 rounded shadow-xs cursor-pointer hover:bg-gray-100 ">

                                <input type="file"
                                    wire:model="photo_path"
                                    x-ref="photo_path"
                                    id="photo_path"
                                    x-on:change="
                                        photoName = $refs.photo_path.files[0].name;
                                        const reader = new FileReader();
                                        reader.onload = (e) => {
                                            photoPreview = e.target.result;
                                        };
                                        reader.readAsDataURL($refs.photo_path.files[0]);
                                    "
                                hidden>

                                <div x-show="! photoPreview">
                                    <div class="d-flex justify-content-center">
                                        <svg height="34" width="34" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                        </svg>
                                    </div>
                                </div>
                            </label>
                            @error('photo_path') <p class="ml-2 text-lg italic text-red-500">{{$message}}</p> @enderror
                            <div id="displayFileName" wire:ignore></div>
                        </div>
                        <div class = "ml-4">
                            @if ($photo_path)
                                <img class = "h-64 rounded-md shadow" src="{{ $photo_path->temporaryUrl() }}">
                            @endif
                        </div>
                     </div>
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
                                    <input wire:model.defer='price' id="company_website" class="flex-1 block w-full text-xl transition duration-150 ease-in-out rounded-none form-input rounded-r-md sm:leading-5">
                                    </div>
                                    @error('price') <span class="italic text-red-600 error">{{ $message }}</span> @enderror
                                </div>
                                <div class="w-1/2 my-4">
                                    <div class="">
                                        <label for="company_website" class="block text-sm font-medium leading-5 text-gray-700 capitalize">
                                        Inventory
                                        </label>
                                        <div class="flex mt-1 rounded-md shadow-sm">
                                        <span class="inline-flex items-center px-3 text-sm text-gray-500 border border-r-0 border-gray-300 rounded-l-md bg-gray-50">
                                        Number available
                                        </span>
                                        <input wire:model.defer='number_available' id="company_website" class="flex-1 block w-full text-xl transition duration-150 ease-in-out rounded-none form-input rounded-r-md">
                                        </div>
                                        @error('number_available') <span class="italic text-red-600 error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="w-1/2 mb-4 mr-2">
                                    <label for="country" class="block text-sm font-medium leading-5 text-gray-700 capitalize">product category</label>
                                    <select wire:model.prevent ="product_category_id" id="country" class="block w-full px-3 py-2 mt-1 text-xl capitalize transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md shadow-sm form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300">
                                        <option>Select Category</option>
                                        @forelse($productCategory as $category)
                                            <option class = "capitalize" value = "{{$category->id}}" >Sleep Wear</option>
                                            @empty
                                        @endforelse
                                    </select>
                                    @error('product_category_id') <span class="italic text-red-600 error">{{ $message }}</span> @enderror
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
                                        <input wire:model.defer='title' id="company_website" class="flex-1 block w-full text-xl transition duration-150 ease-in-out rounded-none form-input rounded-r-md">
                                        </div>
                                        @error('title') <span class="italic text-red-600 error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="my-2">
                                    <label for="about" class="block text-sm font-medium leading-5 text-gray-700 capitalize">
                                        product Description
                                    </label>
                                    <div class="rounded-md shadow-sm">
                                        <textarea wire:model.defer="description" id="about" rows="3" class="block w-full mt-1 transition duration-150 ease-in-out form-textarea sm:text-sm sm:leading-5" placeholder="description here"></textarea>
                                    </div>
                                    @error('description') <span class="italic text-red-600 error">{{ $message }}</span> @enderror
                                    <p class="mt-2 text-sm text-gray-500 ">
                                        Brief description for your product.
                                    </p>
                                </div>

                                <div class="w-1/4 col-span-3 sm:col-span-3">
                                    <label for="country" class="block text-sm font-medium leading-5 text-gray-700">Status</label>
                                    <select wire:model.prevent ="status" id="country" class="block w-full px-3 py-2 mt-1 text-xl transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md shadow-sm form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300">
                                        <option>Select Status</option>
                                        <option value = "publish" >Publish</option>
                                        <option value = "pending" >Pending</option>
                                    </select>
                                    @error('status') <span class="italic text-red-600 error">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="px-4 py-3 text-right bg-gray-50 sm:px-6">
                        <span class="inline-flex rounded-md shadow-sm">
                            <button class="btn btn-dark">create product</button>
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


