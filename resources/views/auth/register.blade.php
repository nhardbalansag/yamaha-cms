<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            {{-- <img class="w-40" src="{{ asset('slides-resource/Yamaha-logo.png') }}" alt=""> --}}
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf
             <x-jet-input id="url" class="hidden w-full mt-1 " type="text" name="url" :value="url()->current()"  autofocus autocomplete="url" />
            {{-- first name --}}
             <div>
                <x-jet-label for="first_name" value="{{ __('First name') }}" />
                <x-jet-input id="first_name" class="block w-full mt-1" type="text" name="first_name" :value="old('first_name')" required autofocus autocomplete="first_name" />
            </div>
            {{-- last name --}}
            <div>
                <x-jet-label for="name" value="{{ __('Last name') }}" />
                <x-jet-input id="name" class="block w-full mt-1" type="text" name="last_name" :value="old('last_name')" required autofocus autocomplete="last_name" />
            </div>
            {{-- middle name --}}
             <div>
                <x-jet-label for="middle_name" value="{{ __('Middle name') }}" />
                <x-jet-input id="middle_name" class="block w-full mt-1" type="text" name="middle_name" :value="old('middle_name')" required autofocus autocomplete="middle_name" />
            </div>

            {{-- home address --}}
             <div>
                <x-jet-label for="home_address" value="{{ __('home address') }}" />
                <x-jet-input id="home_address" class="block w-full mt-1" type="text" name="home_address" :value="old('home_address')" required autofocus autocomplete="home_address" />
            </div>

            {{-- street address --}}
             <div>
                <x-jet-label for="street_address" value="{{ __('street address') }}" />
                <x-jet-input id="street_address" class="block w-full mt-1" type="text" name="street_address" :value="old('street_address')" required autofocus autocomplete="street_address" />
            </div>

            {{-- country --}}
             <div>
                <x-jet-label for="country_region" value="{{ __('country/region') }}" />
                <x-jet-input id="country_region" class="block w-full mt-1" type="text" name="country_region" :value="old('country_region')" required autofocus autocomplete="country_region" />
            </div>

            {{-- contact_number  --}}
             <div>
                <x-jet-label for="contact_number" value="{{ __('contact number') }}" />
                <x-jet-input id="contact_number" class="block w-full mt-1" type="text" name="contact_number" :value="old('contact_number')" required autofocus autocomplete="contact_number" />
            </div>

            {{-- city  --}}
             <div>
                <x-jet-label for="city" value="{{ __('city') }}" />
                <x-jet-input id="city" class="block w-full mt-1" type="text" name="city" :value="old('city')" required autofocus autocomplete="city" />
            </div>

            {{-- province  --}}
             <div>
                <x-jet-label for="state_province" value="{{ __('state province') }}" />
                <x-jet-input id="state_province" class="block w-full mt-1" type="text" name="state_province" :value="old('state_province')" required autofocus autocomplete="state_province" />
            </div>

            {{-- postal  --}}
            <div>
                <x-jet-label for="postal" value="{{ __('postal') }}" />
                <x-jet-input id="postal" class="block w-full mt-1" type="text" name="postal" :value="old('postal')" required autofocus autocomplete="postal" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block w-full mt-1" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block w-full mt-1" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="text-sm text-gray-600 underline hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
