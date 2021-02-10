
<div class="p-4 m-4">
    <div class="md:col-span-1">
        <h3 class="text-lg font-medium leading-6 text-gray-900 capitalize"> product specification </h3>
    </div>
    <div class="">
        <div>
            @if (session()->has('message'))
                <div class="container capitalize alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
        </div>
        <form wire:submit.prevent="editProductSpecification" enctype="multipart/form-data">
            <div class="sm:rounded-md sm:overflow-hidden">
                <div class="">
                    <div class="w-1/2 mb-4">
                        <label for="company_website" class="block text-lg font-medium leading-5 text-gray-700 capitalize">
                        Specification title
                        </label>
                        <div class="flex mt-1 rounded-md shadow-sm">
                        <span class="inline-flex items-center px-3 text-sm text-gray-500 border border-r-0 border-gray-300 rounded-l-md bg-gray-50">
                            Title
                        </span>
                        <input value="{{$this->title = $specification->title }}"  wire:model.defer='title' id="company_website" class="flex-1 block w-full text-lg transition duration-150 ease-in-out rounded-none form-input rounded-r-md ">
                        </div>
                            @error('title') <span class="text-red-600 error">{{ $message }}</span> @enderror
                    </div>

                    <div class="w-3/4">
                        <label for="about" class="block text-lg font-medium leading-5 text-gray-700 capitalize">
                            Description
                        </label>
                        <div class="rounded-md shadow-sm">
                            <textarea value="{{$this->description = $specification->description }}"  wire:model.defer="description" id="about" rows="3" class="block w-full mt-1 transition duration-150 ease-in-out form-textarea sm:text-sm sm:leading-5" placeholder="description here"></textarea>
                        </div>
                            @error('description') <span class="text-red-600 error">{{ $message }}</span> @enderror
                        <p class="mt-2 text-sm text-gray-500 ">
                            Brief description for your specification
                        </p>
                    </div>

                    <div class="w-1/4">
                        <label for="country" class="block text-lg font-medium leading-5 text-gray-700 capitalize">status</label>
                        <select value="{{$this->status = $specification->status }}" wire:model.prevent ="status" id="country" class="block w-full px-3 py-2 mt-1 text-lg transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md shadow-sm form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300">
                            <option>Select Status</option>
                            <option value = "publish" >Publish</option>
                            <option value = "pending" >Pending</option>
                        </select>
                            @error('status') <span class="text-red-600 error">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="px-4 text-right py-30 sm:px-6 ">
                    <span class="inline-flex rounded-md shadow-sm">
                        <button class="btn btn-dark">Edit Specification</button>
                    </span>
                </div>
            </div>
        </form>
    </div>
    <div wire:loading>
        @include('pages.components.loadingState')
    </div>
</div>


