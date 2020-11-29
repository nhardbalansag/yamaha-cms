 <div>
        <div class=" sm:mt-0">
            <div class="md:mt-0 md:col-span-2">
                <div class="my-4 sm:px-0">
                <h1 class="text-lg leading-6 text-black">Create your Account</h1>
            </div>
            <div>
                @if (session()->has('message'))
                    <div class="container capitalize alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
            </div>
                <x-jet-validation-errors class="mb-4" />
                <form method="POST" action="{{ route('register') }}" >
                    @csrf
                    <div class="p-0 m-auto">
                        <x-jet-input id="url" class="hidden w-full p-2 mt-1 transition duration-150 ease-in-out border-gray-600 border-solid border-1 form-input sm:text-sm sm:leading-5" type="text" name="url" :value="url()->current()"  autofocus autocomplete="url" />
                        <div class="p-0 m-auto row col-12 col-md-12">
                            <div class="col-12 col-md-4">
                                <x-jet-label for="email" value="{{ __('Email') }}" />
                                <x-jet-input id="email" class="block w-full p-2 mt-1 transition duration-150 ease-in-out border-gray-600 border-solid border-1 form-input sm:text-sm sm:leading-5" type="text" name="email" :value="old('email')" required autofocus autocomplete="email" />
                            </div>
                            <div class="col-12 col-md-4">
                                <x-jet-label for="contact_number" value="{{ __('contact number') }}" />
                                <x-jet-input id="contact_number" class="block w-full p-2 mt-1 transition duration-150 ease-in-out border-gray-600 border-solid border-1 form-input sm:text-sm sm:leading-5" type="text" name="contact_number" :value="old('contact_number')" required autofocus autocomplete="contact_number" />
                            </div>
                        </div>
                        <div class="p-0 m-auto row col-12 col-md-12">
                            <div class="col-12 col-md-4">
                                <x-jet-label for="first_name" value="{{ __('First name') }}" />
                                <x-jet-input id="first_name" class="block w-full p-2 mt-1 transition duration-150 ease-in-out border-gray-600 border-solid border-1 form-input sm:text-sm sm:leading-5" type="text" name="first_name" :value="old('first_name')" required autofocus autocomplete="first_name" />
                            </div>
                            <div class=" col-12 col-md-4">
                                <x-jet-label for="name" value="{{ __('Last name') }}" />
                                <x-jet-input id="name" class="block w-full p-2 mt-1 transition duration-150 ease-in-out border-gray-600 border-solid border-1 form-input sm:text-sm sm:leading-5" type="text" name="last_name" :value="old('last_name')" required autofocus autocomplete="last_name" />
                            </div>
                            <div class="col-12 col-md-4">
                                <x-jet-label for="middle_name" value="{{ __('Middle name') }}" />
                                <x-jet-input id="middle_name" class="block w-full p-2 mt-1 transition duration-150 ease-in-out border-gray-600 border-solid border-1 form-input sm:text-sm sm:leading-5" type="text" name="middle_name" :value="old('middle_name')" autofocus autocomplete="middle_name" />
                            </div>
                        </div>
                        <hr class="bg-black">
                        <div class="p-0 m-auto mt-4 row col-12 col-md-12">
                            <div class="col-12 col-md-6">
                                <x-jet-label for="home_address" value="{{ __('home address') }}" />
                                <x-jet-input id="home_address" class="block w-full p-2 mt-1 transition duration-150 ease-in-out border-gray-600 border-solid border-1 form-input sm:text-sm sm:leading-5" type="text" name="home_address" :value="old('home_address')" required autofocus autocomplete="home_address" />
                            </div>
                            <div class="col-12 col-md-6">
                                <x-jet-label for="street_address" value="{{ __('street address') }}" />
                                <x-jet-input id="street_address" class="block w-full p-2 mt-1 transition duration-150 ease-in-out border-gray-600 border-solid border-1 form-input sm:text-sm sm:leading-5" type="text" name="street_address" :value="old('street_address')" required autofocus autocomplete="street_address" />
                            </div>
                        </div>
                        <div class="p-0 m-auto row col-12 col-md-12">
                            <div class="col-12 col-md-3">
                                <x-jet-label for="country_region" value="{{ __('country/region') }}" />
                                <x-jet-input id="country_region" class="block w-full p-2 mt-1 transition duration-150 ease-in-out border-gray-600 border-solid border-1 form-input sm:text-sm sm:leading-5" type="text" name="country_region" :value="old('country_region')" required autofocus autocomplete="country_region" />
                            </div>
                            <div class="col-12 col-md-3">
                                <x-jet-label for="city" value="{{ __('city') }}" />
                                <x-jet-input id="city" class="block w-full p-2 mt-1 transition duration-150 ease-in-out border-gray-600 border-solid border-1 form-input sm:text-sm sm:leading-5" type="text" name="city" :value="old('city')" required autofocus autocomplete="city" />
                            </div>
                            <div class="col-12 col-md-3">
                                <x-jet-label for="state_province" value="{{ __('state province') }}" />
                                <x-jet-input id="state_province" class="block w-full p-2 mt-1 transition duration-150 ease-in-out border-gray-600 border-solid border-1 form-input sm:text-sm sm:leading-5" type="text" name="state_province" :value="old('state_province')" required autofocus autocomplete="state_province" />
                            </div>
                            <div class="col-12 col-md-3">
                                <x-jet-label for="postal" value="{{ __('postal') }}" />
                                <x-jet-input id="postal" class="block w-full p-2 mt-1 transition duration-150 ease-in-out border-gray-600 border-solid border-1 form-input sm:text-sm sm:leading-5" type="text" name="postal" :value="old('postal')" required autofocus autocomplete="postal" />
                            </div>
                        </div>
                        <hr class="bg-black">
                        <div class="my-4 row col-12 col-md-12">
                            <div class="col-12 col-md-6">
                                <x-jet-label for="password" value="{{ __('Password') }}" />
                                <x-jet-input id="password" class="block w-full p-2 mt-1 transition duration-150 ease-in-out border-gray-600 border-solid border-1 form-input sm:text-sm sm:leading-5" type="password" name="password" required autocomplete="new-password" />
                            </div>
                            <div class="col-12 col-md-6">
                                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                                <x-jet-input id="password_confirmation" class="block w-full p-2 mt-1 transition duration-150 ease-in-out border-gray-600 border-solid border-1 form-input sm:text-sm sm:leading-5" type="password" name="password_confirmation" required autocomplete="new-password" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-6"> 
                            <a class="text-sm text-gray-600 underline hover:text-gray-900" href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                            </a>
                        </div>
                        <div class="col-md-6">
                            <x-jet-button>
                                {{ __('Register') }}
                            </x-jet-button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>