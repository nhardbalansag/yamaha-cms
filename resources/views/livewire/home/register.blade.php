 <section>
        <div class=" sm:mt-0">
             
            <div class="md:mt-0 md:col-span-2">
                <div class="my-4 sm:px-0">
                <h1 class="text-5xl font-medium leading-6 text-gray-900">Create your Account</h1>
            </div>
            <div>
                @if (session()->has('message'))
                    <div class="alert alert-success capitalize container">
                        {{ session('message') }}
                    </div>
                @endif
            </div>
            <form wire:submit.prevent="createEndUserRegistration">
                <div class="overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <div class="">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-2 mb-4">
                            <div class="">
                                <label for="email" class="block text-sm font-medium leading-5 text-gray-700">Email address</label>
                                <input wire:model='email' id="email" class="p-2 border-solid border-1 border-gray-600  mt-1 form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                                @error('email') <span class="error text-red-600">{{ $message }}</span> @enderror
                            </div>
                            <div class="">
                                <label for="email_address" class="block text-sm font-medium leading-5 text-gray-700">Contact Number</label>
                                <input  wire:model='contact_number' id="email_address" class="p-2 border-solid border-1 border-gray-600  mt-1 form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                                @error('contact_number') <span class="error text-red-600">{{ $message }}</span> @enderror
                            </div>
                        </div>

                       <div class="grid grid-cols-1 md:grid-cols-3 gap-2  mb-4">
                            <div class="">
                                <label for="first_name" class="block text-sm font-medium leading-5 text-gray-700">First name</label>
                                <input wire:model='first_name' id="first_name" class="p-2 border-solid border-1 border-gray-600 mt-1 form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                                    @error('first_name') <span class="error text-red-600">{{ $message }}</span> @enderror
                            </div>

                            <div class="">
                                <label  for="last_name" class="block text-sm font-medium leading-5 text-gray-700">Last name</label>
                                <input  wire:model='last_name'  id="last_name" class="p-2 border-solid border-1 border-gray-600 mt-1 form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                                    @error('last_name') <span class="error text-red-600">{{ $message }}</span> @enderror
                            </div>

                            <div class="">
                                <label for="last_name" class="block text-sm font-medium leading-5 text-gray-700">Middle name</label>
                                <input wire:model='middle_name' id="last_name" class="p-2 border-solid border-1 border-gray-600 mt-1 form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                                    @error('middle_name') <span class="error text-red-600">{{ $message }}</span> @enderror
                            </div>
                       </div>

                        <div class="col-span-6">
                        <label for="email_address" class="block text-sm font-medium leading-5 text-gray-700">Address</label>
                        <input wire:model='home_address' id="email_address" class="p-2 border-solid border-1 border-gray-600  mt-1 form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                        @error('home_address') <span class="error text-red-600">{{ $message }}</span> @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-2  mt-4">
                        {{--  --}}
                        <div class="">
                            <label for="country" class="block text-sm font-medium leading-5 text-gray-700">Country / Region</label>
                            <select wire:model='country_region' id="country" class="p-2 border-solid border-1 border-gray-600 mt-1 block form-select w-full py-2 px-3 bg-white rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                            <option>United States</option>
                            <option>Canada</option>
                            <option>Mexico</option>
                            </select>
                                @error('country_region') <span class="error text-red-600">{{ $message }}</span> @enderror
                        </div>
                            


                        <div class="">
                            <label for="street_address" class="block text-sm font-medium leading-5 text-gray-700">Street address</label>
                            <input  wire:model='street_address' id="street_address" class="p-2 border-solid border-1 border-gray-600 mt-1 form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                                @error('street_address') <span class="error text-red-600">{{ $message }}</span> @enderror
                        </div>

                        <div class="">
                            <label for="city" class="block text-sm font-medium leading-5 text-gray-700">City</label>
                            <input wire:model='city' id="city" class="p-2 border-solid border-1 border-gray-600 mt-1 form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                                @error('city') <span class="error text-red-600">{{ $message }}</span> @enderror
                        </div>

                        <div class="">
                            <label for="state" class="block text-sm font-medium leading-5 text-gray-700">State / Province</label>
                            <input wire:model='state_province' id="state" class="p-2 border-solid border-1 border-gray-600 mt-1 form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                            @error('state_province') <span class="error text-red-600">{{ $message }}</span> @enderror
                        </div>
                        <div class="">
                            <label for="postal_code" class="block text-sm font-medium leading-5 text-gray-700">ZIP / Postal</label>
                            <input wire:model='postal' id="postal_code" class="p-2 border-solid border-1 border-gray-600 mt-1 form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                            @error('postal') <span class="error text-red-600">{{ $message }}</span> @enderror
                        </div>
                       
                        {{--  --}}
                    </div>
                     <div class="w-1/4">
                        <label for="password" class="block text-sm font-medium leading-5 text-gray-700">Password</label>
                        <input wire:model='password' id="password" type="password" class="p-2 border-solid border-1 border-gray-600  mt-1 form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                        @error('password') <span class="error text-red-600">{{ $message }}</span> @enderror
                    </div>
                    
                    </div>
                </div>
                <div class="px-4 py-3 bg-gray-50 text-left sm:px-6 ">
                    <button type="submit" class="btn  btn-outline-primary">
                    Create account
                    </button>
                </div>
                </div>
            </form>
            </div>
        </div>
    </section>