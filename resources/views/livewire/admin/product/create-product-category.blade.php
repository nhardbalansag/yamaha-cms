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
                <div class="container capitalize alert alert-success">
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
                                <div class="flex mt-1 rounded-md shadow-sm">
                                <span class="inline-flex items-center px-3 text-sm text-gray-500 border border-r-0 border-gray-300 rounded-l-md bg-gray-50">
                                   title
                                </span>
                                <input wire:model='title' id="company_website" class="flex-1 block w-full transition duration-150 ease-in-out rounded-none form-input rounded-r-md sm:text-sm sm:leading-5">
                                </div>
                                 @error('title') <span class="text-red-600 error">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="mt-6">
                            <label for="about" class="block text-sm font-medium leading-5 text-gray-700 capitalize">
                                Description
                            </label>
                            <div class="rounded-md shadow-sm">
                                <textarea wire:model="description" id="about" rows="6" class="block w-full mt-1 transition duration-150 ease-in-out form-textarea sm:text-sm sm:leading-5" placeholder="description here"></textarea>
                            </div>
                             @error('description') <span class="text-red-600 error">{{ $message }}</span> @enderror
                            <p class="mt-2 text-sm text-gray-500 ">
                                Brief description for your category type.
                            </p>
                        </div>

                        <div class="w-1/4 col-span-3 sm:col-span-3">
                            <label for="country" class="block text-sm font-medium leading-5 text-gray-700">Country / Region</label>
                            <select wire:model.prevent ="status" id="country" class="block w-full px-3 py-2 mt-1 text-xl transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md shadow-sm form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300">
                                <option >Select Status</option>
                                <option value = "publish" >Publish</option>
                                <option value = "pending" >Pending</option>
                            </select>
                              @error('status') <span class="text-red-600 error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="px-4 py-3 text-right bg-gray-50 sm:px-6">
                        <span class="inline-flex rounded-md shadow-sm">
                        <button type="submit" class="inline-flex justify-center px-4 py-2 text-sm font-medium leading-5 text-white transition duration-150 ease-in-out bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700">
                            Save
                        </button>
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
