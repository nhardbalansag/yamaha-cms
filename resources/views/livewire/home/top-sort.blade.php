<div class = "grid items-center justify-around grid-cols-1 p-3 mb-5 bg-white rounded shadow md:flex">
    <div class="w-full md:w-48">
        <div class="relative">
            <div class="">
                <select wire:model='country_region' id="country" class="block w-full p-2 px-3 py-2 mt-1 transition duration-150 ease-in-out bg-white border-gray-600 border-solid rounded-md shadow-sm border-1 form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5">
                    @for($i = 0; $i < count($productCategory); $i++)
                        <option value = "{{$productCategory[$i]['id']}}">{{$productCategory[$i]['title']}}</option>
                    @endfor
                </select>
            </div>
        </div>
    </div>
    <div>
        <p class = "font-semibold">search returned {{$product[0]->productCount}} results</p>
    </div>
    <div class = "flex hidden md:flex">
        <a href="" >
            <svg class = "w-6 text-black" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
            <path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
            </svg>
        </a>
        <a href="">
            <svg class = "text-black w-6 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
            </svg>
        </a>
    </div>
</div>