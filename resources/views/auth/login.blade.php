<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />
        <div class="flex flex-col gap-y-3 items-center font-bold text-[35px] text-[#000]">Log In</div> 

        @session('status')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ $value }}
            </div>
        @endsession

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email"  value="{{ __('Email') }}" />
                <x-input id="email"  placeholder="Enter Email Address" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password"  placeholder="Enter Password" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="flex items-center mt-4">
                <div class="flex-grow mt-1">
                    <label for="remember_me" class="flex items-center">
                        <x-checkbox id="remember_me" name="remember" />
                        <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div>
                <div class="flex-shrink">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900 " href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                </div>
            </div>

            <div class="block mt-4">
                <x-button  >
                    {{ __('Log In') }}
                </x-button>
            </div>

            <div class="mt-10 text-center">
                <span class="text-[14px] text-[#000] ml-2">{{ __("Don't have an account?") }}</span>

                <a class="underline text-[14px] text-[#000] font-bold" href="{{ route('register') }}">
                        {{ __('Sign Up') }}
                </a>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>