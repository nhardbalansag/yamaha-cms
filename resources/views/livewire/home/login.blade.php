<section>
    <div class="flex items-center justify-center px-4 py-12 sm:px-6 lg:px-8">
        <div class="max-w-md ">
            <div>
            <h2 class="mt-6 text-3xl text-gray-900">
                Sign in to your account
            </h2>
            </div>
                <x-jet-validation-errors class="mb-4" />
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <input type="hidden" name="remember" value="true">
                    <div class="-space-y-px rounded-md shadow-sm">
                        <div class="mb-3">
                            <label for="email-address" class="sr-only" >Email address</label>
                            <input  id="email" type="email" name="email" :value="old('email')" required autofocus class="block w-full p-2 mt-1 transition duration-150 ease-in-out border-gray-600 border-solid border-1 form-input sm:text-sm sm:leading-5" placeholder="Email address">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="sr-only">Password</label>
                            <input id="password"  type="password" name="password" required autocomplete="current-password" class="block w-full p-2 mt-1 transition duration-150 ease-in-out border-gray-600 border-solid border-1 form-input sm:text-sm sm:leading-5" placeholder="Password">
                        </div>
                    </div>

                    <div class="">
                        <div class="d-flex align-items-center">
                            <input id="remember_me" type="checkbox" class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                            <label for="remember_me" class="block ml-2 text-sm text-gray-900">
                            Remember me
                            </label>
                        </div>
                        <div class="mb-4 d-flex align-items-center">
                            @if (Route::has('password.request'))
                                <a class="font-medium text-primary" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                                </a>
                            @endif
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">Login</button>
                        <a href="/customer/register" type="submit" class="btn btn-primary">Register</a>
                    </div>
                </form>
            </div>
        </div>
        <div wire:loading>
            @include('pages.components.loadingState')
        </div>
</section>


