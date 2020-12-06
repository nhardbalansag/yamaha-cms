<div class = "block mb-5 bg-white rounded collapse d-md-block" id="search">
    <form class="" action = "" method = "">
        <div class="mb-6">
            <div class="flex items-center px-4 py-3 mb-3 text-sm font-bold text-white bg-blue-500" role="alert">
                <svg class="w-4 h-4 mr-2 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
                <p class = "capitalize">search what you want.</p>
            </div>
            <div class="mb-2">
                <label class="block mb-2 text-xl tracking-wide capitalize" for="grid-first-name">
                    keyword
                </label>
                <input class="block w-full px-2 py-2 mb-3 border rounded appearance-none focus:outline-none focus:bg-white" id="grid-first-name" type="text" placeholder="Search">
                <p class="text-lg italic text-red-500">Please fill out this field.</p>
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
            <div class="w-full px-3">
                <label class="block mb-2 text-xl tracking-wide capitalize" for="grid-last-name">
                    transmission
                </label>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">automatic</label>
                </div>
                    <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">manual</label>
                </div>
            </div>
            <div class="mb-2">
                <label class="block mb-2 text-xl tracking-wide capitalize" for="grid-first-name">
                    fuel
                </label>
                <input class="block w-full p-3 mb-3 leading-tight border appearance-none focus:outline-none focus:bg-white" id="grid-first-name" type="text" placeholder="Search">
                <p class="text-lg italic text-red-500">Please fill out this field.</p>
            </div>
        </div>
        <div class = "text-center ">
            <button type="button" class="w-full btn btn-outline-primary btn-lg">Search product</button>
        </div>
    </form>
</div>