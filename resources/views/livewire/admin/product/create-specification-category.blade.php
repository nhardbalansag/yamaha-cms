<div class="mt-10 sm:mt-0">
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
            <form wire:submit.prevent="createCategory">
                <div class="sm:rounded-md sm:overflow-hidden">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div class="grid grid-cols-3 gap-6">
                            <div class="col-span-3 sm:col-span-2">
                                <label for="company_website" class="block text-sm font-medium leading-5 text-gray-700 capitalize">
                                Category title
                                </label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
                                   title
                                </span>
                                <input wire:model='title' id="company_website" class="form-input flex-1 block w-full rounded-none rounded-r-md transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                                </div>
                                 @error('title') <span class="error text-red-600">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="mt-6 w-3/4">
                            <label for="about" class="block text-sm leading-5 font-medium text-gray-700 capitalize">
                                Description
                            </label>
                            <div class="rounded-md shadow-sm">
                                <textarea wire:model="description" id="about" rows="6" class="form-textarea mt-1 block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5" placeholder="description here"></textarea>
                            </div>
                             @error('description') <span class="error text-red-600">{{ $message }}</span> @enderror
                            <p class="mt-2 text-sm text-gray-500 ">
                                Brief description for your category type.
                            </p>
                        </div>
                        
                        <div class="col-span-3 sm:col-span-3 w-1/4">
                            <label for="country" class="block text-sm font-medium leading-5 text-gray-700">Country / Region</label>
                            <select wire:model.prevent ="status" id="country" class="mt-1 block form-select w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                                <option>Select Status</option>
                                <option value = "publish" >Publish</option>
                                <option value = "pending" >Pending</option>
                            </select>
                              @error('status') <span class="error text-red-600">{{ $message }}</span> @enderror
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