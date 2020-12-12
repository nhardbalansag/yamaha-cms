<div class = "block mb-5 bg-white rounded collapse d-md-block" id="search">
    <form class="" action = "" method = "">
        <div>
            <div class="py-2 mb-2 text-sm text-center text-white bg-primary alert ">
                <p class = "capitalize">search product</p>
            </div>
            <div class="mb-6">
                <div class="">
                    <label for="country" class="block text-sm font-medium leading-5 text-gray-700">Sort</label>
                    <select wire:model='country_region' id="country" class="block w-full p-2 px-3 py-2 mt-1 transition duration-150 ease-in-out bg-white border-gray-400 border-solid rounded-md shadow-sm border-1 form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5">
                    <option>United States</option>
                    <option>Canada</option>
                    <option>Mexico</option>
                    </select>
                        @error('country_region') <span class="text-red-600 error">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="mb-6">
                <div class="">
                    <label for="country" class="block text-sm font-medium leading-5 text-gray-700">Order By</label>
                    <select wire:model='country_region' id="country" class="block w-full p-2 px-3 py-2 mt-1 transition duration-150 ease-in-out bg-white border-gray-400 border-solid rounded-md shadow-sm border-1 form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5">
                    <option>United States</option>
                    <option>Canada</option>
                    <option>Mexico</option>
                    </select>
                        @error('country_region') <span class="text-red-600 error">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="mb-6">
                 <div class="">
                    <label for="country" class="block text-sm font-medium leading-5 text-gray-700">Motorcycle type</label>
                    <select wire:model='country_region' id="country" class="block w-full p-2 px-3 py-2 mt-1 transition duration-150 ease-in-out bg-white border-gray-400 border-solid rounded-md shadow-sm border-1 form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5">
                    <option>United States</option>
                    <option>Canada</option>
                    <option>Mexico</option>
                    </select>
                        @error('country_region') <span class="text-red-600 error">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="mb-6">
                 <div class="">
                    <label for="country" class="block text-sm font-medium leading-5 text-gray-700">Category</label>
                    <select wire:model='country_region' id="country" class="block w-full p-2 px-3 py-2 mt-1 transition duration-150 ease-in-out bg-white border-gray-400 border-solid rounded-md shadow-sm border-1 form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5">
                    <option>United States</option>
                    <option>Canada</option>
                    <option>Mexico</option>
                    </select>
                        @error('country_region') <span class="text-red-600 error">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="mb-6">
                 <div class="">
                    <label for="country" class="block text-sm font-medium leading-5 text-gray-700">Model</label>
                    <select wire:model='country_region' id="country" class="block w-full p-2 px-3 py-2 mt-1 transition duration-150 ease-in-out bg-white border-gray-400 border-solid rounded-md shadow-sm border-1 form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5">
                    <option>United States</option>
                    <option>Canada</option>
                    <option>Mexico</option>
                    </select>
                        @error('country_region') <span class="text-red-600 error">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>
        <div class = "text-center ">
            <button type="button" class="w-full btn btn-dark">Search product</button>
        </div>
    </form>
</div>
