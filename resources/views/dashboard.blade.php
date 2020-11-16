<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight capitalize">
            {{ Request::route()->getName() }}
        </h2>
        <ul class="flex">
            <li class="mr-6">
                <a class="text-blue-500 hover:text-blue-800 capitalize" href=" /product/createCategory">product category</a>
            </li>
            <li class="mr-6">
                <a class="text-blue-500 hover:text-blue-800 capitalize" href="/product/specificationCategory/create">specification category</a>
            </li>
            <li class="mr-6">
                <a class="text-blue-500 hover:text-blue-800 capitalize" href="/product/specification/create">specification</a>
            </li>
            <li class="mr-6">
                <a class="text-blue-500 hover:text-blue-800 capitalize" href="/product/color/create">colors category</a>
            </li>
        </ul>
         <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Manage Products
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item capitalize" href="/product/create">create product</a>
                <a class="dropdown-item capitalize" href="#">pending product</a>
                <a class="dropdown-item capitalize" href="#">publish product</a>
                <a class="dropdown-item capitalize" href="/product/all">view all product</a>
            </div>
        </div>
    </x-slot>
    sdfsfsfsfsdsf

    <div class="py-12">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

            @yield('contents')

        </div>
    </div>
</x-app-layout>
