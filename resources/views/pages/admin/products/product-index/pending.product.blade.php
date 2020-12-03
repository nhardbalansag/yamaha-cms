@extends('dashboard')
@section('contents')

    @extends('dashboard')
@section('contents')

        <div class="p-3 my-3 bg-white rounded shadow-sm">
                <h6 class="pb-2 mb-0 border-bottom border-gray">Recent added Product</h6>
                {{-- start table --}}
                <div class=" table-responsive-sm">
                            <table class="table">
                                <thead >
                                    <tr >
                                    <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-center text-gray-500 uppercase bg-gray-50">
                                        Name
                                    </th>
                                    <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-center text-gray-500 uppercase bg-gray-50">
                                        Title
                                    </th>
                                    <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-center text-gray-500 uppercase bg-gray-50">
                                        Status
                                    </th>
                                    <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-center text-gray-500 uppercase bg-gray-50">
                                        category
                                    </th>
                                    <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-center text-gray-500 uppercase bg-gray-50">
                                        price
                                    </th>
                                     <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-center text-gray-500 uppercase bg-gray-50">
                                        date created
                                    </th>
                                     <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-center text-gray-500 uppercase bg-gray-50">
                                        action
                                    </th>
                                     <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-center text-gray-500 uppercase bg-gray-50">
                                        action
                                    </th>
                                     <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-center text-gray-500 uppercase bg-gray-50">
                                        action
                                    </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                               
                                @foreach($products as $key => $value)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-no-wrap ">
                                            <div class="flex-shrink-0 w-20 h-20">
                                                <img class="w-full h-full " src="{{asset('storage/' . $value->products_photo_path) }}" alt="">
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 text-center whitespace-no-wrap">
                                            <div class="text-sm leading-5 text-gray-900">{{$value->products_title}}</div>
                                        </td>
                                        <td class="px-6 py-4 text-center whitespace-no-wrap">
                                            <span class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">
                                            {{$value->products_status}}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 text-sm leading-5 text-center text-gray-500 whitespace-no-wrap">
                                            {{$value->categoryTitle }}
                                        </td>
                                        <td class="px-6 py-4 text-sm leading-5 text-center text-gray-500 whitespace-no-wrap">
                                             {{$value->products_price }}
                                        </td>
                                        <td class="px-6 py-4 text-sm leading-5 text-center text-gray-500 whitespace-no-wrap">
                                             {{ $value->products_created_at }}
                                        </td>
                                        <td class="px-6 py-4 text-sm leading-5 text-center whitespace-no-wrap ">
                                            <a href="/product/view/{{ $value->products_id }}" class="text-indigo-600 hover:text-indigo-900">view</a>
                                        </td>
                                        <td class="px-6 py-4 text-sm leading-5 whitespace-no-wrap">
                                            <a href="#" class="text-center text-indigo-600 hover:text-indigo-900">Edit</a>
                                        </td>
                                        <td class="px-6 py-4 text-sm leading-5 whitespace-no-wrap">
                                            <a href="#" class="text-center text-indigo-600 hover:text-indigo-900">delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                                    <!-- More rows... -->
                                </tbody>
                            </table>
                            {{--  --}}
                            <div class="flex items-center justify-between px-4 py-3 bg-white border-t border-gray-200 sm:px-6">
                                <div class="flex justify-between flex-1 sm:hidden">
                                    <a href="#" class="relative inline-flex items-center px-4 py-2 text-sm font-medium leading-5 text-gray-700 transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700">
                                    Previous
                                    </a>
                                    <a href="#" class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium leading-5 text-gray-700 transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700">
                                    Next
                                    </a>
                                </div>
                                <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                                    <div>
                                        <p class="text-sm leading-5 text-gray-700">
                                            Showing
                                            <span class="font-medium">1</span>
                                            to
                                            <span class="font-medium">10</span>
                                            of
                                            <span class="font-medium">97</span>
                                            results
                                        </p>
                                    </div>
                                    <div>
                                        <nav class="relative z-0 inline-flex shadow-sm">
                                            <a href="#" class="relative inline-flex items-center px-2 py-2 text-sm font-medium leading-5 text-gray-500 transition duration-150 ease-in-out bg-white border border-gray-300 rounded-l-md hover:text-gray-400 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-100 active:text-gray-500" aria-label="Previous">
                                            <!-- Heroicon name: chevron-left -->
                                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                                </svg>
                                            </a>
                                            <a href="#" class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium leading-5 text-gray-700 transition duration-150 ease-in-out bg-white border border-gray-300 hover:text-gray-500 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-100 active:text-gray-700">
                                            1
                                            </a>
                                            <a href="#" class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium leading-5 text-gray-700 transition duration-150 ease-in-out bg-white border border-gray-300 hover:text-gray-500 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-100 active:text-gray-700">
                                            2
                                            </a>
                                            <a href="#" class="relative items-center hidden px-4 py-2 -ml-px text-sm font-medium leading-5 text-gray-700 transition duration-150 ease-in-out bg-white border border-gray-300 md:inline-flex hover:text-gray-500 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-100 active:text-gray-700">
                                            3
                                            </a>
                                            <span class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium leading-5 text-gray-700 bg-white border border-gray-300">
                                            ...
                                            </span>
                                            <a href="#" class="relative items-center hidden px-4 py-2 -ml-px text-sm font-medium leading-5 text-gray-700 transition duration-150 ease-in-out bg-white border border-gray-300 md:inline-flex hover:text-gray-500 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-100 active:text-gray-700">
                                            8
                                            </a>
                                            <a href="#" class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium leading-5 text-gray-700 transition duration-150 ease-in-out bg-white border border-gray-300 hover:text-gray-500 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-100 active:text-gray-700">
                                            9
                                            </a>
                                            <a href="#" class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium leading-5 text-gray-700 transition duration-150 ease-in-out bg-white border border-gray-300 hover:text-gray-500 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-100 active:text-gray-700">
                                            10
                                            </a>
                                            <a href="#" class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium leading-5 text-gray-500 transition duration-150 ease-in-out bg-white border border-gray-300 rounded-r-md hover:text-gray-400 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-100 active:text-gray-500" aria-label="Next">
                                            <!-- Heroicon name: chevron-right -->
                                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                            </svg>
                                            </a>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                            {{--  --}}
                        </div>
                {{-- table --}}
            </div>
@endsection
     

@endsection