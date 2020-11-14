
 

<div class="mt-10 pt-4 sm:mt-0">
    <div class="">
        <div class="md:col-span-1">
            <div class="px-4 sm:px-0">
                <h3 class="text-lg font-medium leading-6 text-gray-900 capitalize"> {{Request::route()->getName()}} </h3>
                <p class="mt-1 text-sm leading-5 text-gray-600 capitalize">
                    create your {{Request::route()->getName()}} 
                </p>
            </div>
        </div>  
        <div class="mt-5 md:mt-0 md:col-span-2">
        <div>
            @if (session()->has('message'))
                <div class="alert alert-success capitalize container">
                    {{ session('message') }}
                </div>
            @endif
        </div>
            <form wire:submit.prevent="createProduct" enctype="multipart/form-data">
                <div class="sm:rounded-md sm:overflow-hidden">
                    <label class="ml-4 block text-sm font-medium leading-5 text-gray-700 capitalize">
                        Upload product photo
                    </label>
                     <div>
                        <div>
                            <label class="ml-4 cursor-pointer bg-white hover:bg-gray-100 w-1/2 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow-xs ">

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
                            @error('photo_path') <p class="text-red-500 text-lg italic ml-2">{{$message}}</p> @enderror
                            <div id="displayFileName" wire:ignore></div>
                        </div>
                        <div class = "ml-4">
                            @if ($photo_path)
                                <img class = "h-64 rounded-md shadow" src="{{ $photo_path->temporaryUrl() }}">
                            @endif
                        </div>
                     </div>
                    <div class="px-4 py-5 bg-white sm:p-6 grid grid-cols-1">
                        <div >
                            <div>
                                <div class="py-2 my-4 w-1/2">
                                    <label for="company_website" class="block text-sm font-medium leading-5 text-gray-700 capitalize">
                                    product prize
                                    </label>
                                    <div class="mt-1 flex rounded-md shadow-sm">
                                    <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
                                    Price
                                    </span>
                                    <input wire:model='price' id="company_website" class="form-input flex-1 block w-full rounded-none rounded-r-md text-xl transition duration-150 ease-in-out sm:leading-5">
                                    </div>
                                    @error('price') <span class="error text-red-600 italic">{{ $message }}</span> @enderror
                                </div>
                                <div class="w-1/2 mr-2 mb-4">
                                    <label for="country" class="block text-sm font-medium leading-5 text-gray-700 capitalize">product category</label>
                                    <select wire:model.prevent ="product_category_id" id="country" class="capitalize mt-1 block form-select w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out text-xl">
                                        @forelse($productCategory as $category)
                                            <option class = "capitalize" value = "{{$category->id}}" >{{$category->title}}</option>
                                            @empty
                                        @endforelse
                                    </select>
                                    @error('product_category_id') <span class="error text-red-600 italic">{{ $message }}</span> @enderror
                                </div>
                                {{-- <div class=" w-1/2  mr-2">
                                    <label for="country" class="block text-sm font-medium leading-5 text-gray-700 capitalize">specification</label>
                                    <select wire:model.prevent ="specification_id" id="country" class="mt-1 block form-select w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                                        @forelse($specification as $category)
                                            <option value = "{{$category->id}}" >{{$category->title}}</option>
                                            @empty
                                        @endforelse
                                    </select>
                                    @error('specification_id') <span class="error text-red-600 italic">{{ $message }}</span> @enderror
                                </div> --}}
                                <div class="w-1/2  mr-2">
                                    <label for="country" class="block text-sm font-medium leading-5 text-gray-700 capitalize">product color</label>
                                    <select wire:model.prevent ="colors_type_id" id="country" class="capitalize mt-1 block form-select w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out text-xl ">
                                        @forelse($colorCategory as $category)
                                            <option class = "capitalize" value = "{{$category->id}}" >{{$category->title}}</option>
                                            @empty
                                        @endforelse
                                    </select>
                                    @error('colors_type_id') <span class="error text-red-600 italic">{{ $message }}</span> @enderror
                                </div>
                                <div class="my-4">
                                    <div class="">
                                        <label for="company_website" class="block text-sm font-medium leading-5 text-gray-700 capitalize">
                                        product name
                                        </label>
                                        <div class="mt-1 flex rounded-md shadow-sm">
                                        <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
                                        Title
                                        </span>
                                        <input wire:model='title' id="company_website" class="form-input flex-1 block w-full rounded-none rounded-r-md transition duration-150 ease-in-out text-xl">
                                        </div>
                                        @error('title') <span class="error text-red-600 italic">{{ $message }}</span> @enderror
                                    </div>
                                </div>

                                <div class="my-2">
                                    <label for="about" class="block text-sm leading-5 font-medium text-gray-700 capitalize">
                                        product Description
                                    </label>
                                    <div class="rounded-md shadow-sm">
                                        <textarea wire:model="description" id="about" rows="3" class="form-textarea mt-1 block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5" placeholder="description here"></textarea>
                                    </div>
                                    @error('description') <span class="error text-red-600 italic">{{ $message }}</span> @enderror
                                    <p class="mt-2 text-sm text-gray-500 ">
                                        Brief description for your category type.
                                    </p>
                                </div>
                                
                                <div class="col-span-3 sm:col-span-3 w-1/4">
                                    <label for="country" class="block text-sm font-medium leading-5 text-gray-700">Status</label>
                                    <select wire:model.prevent ="status" id="country" class="mt-1 block form-select w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out text-xl">
                                        <option value = "publish" >Publish</option>
                                        <option value = "pending" >Pending</option>
                                    </select>
                                    @error('status') <span class="error text-red-600 italic">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                        <span class="inline-flex rounded-md shadow-sm">
                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                            Save
                        </button>
                        </span>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


