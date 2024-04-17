<x-guest-layout>
    <x-authentication-card>        
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="flex flex-col gap-y-3 items-center font-bold text-[35px] text-[#000]">Log In</div>
            
            <div class="mt-6">
                <x-label class="font-semibold text-[18px] text-[#000]" for="email" value="{{ __('Email *') }}" />
                <input id="email" class="block mt-3 w-full rounded-none text-[15px] border-gray-300 focus:border-[#000] focus:ring-[#000]" type="email" name="email" placeholder="Enter Email Address" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-6">
                <x-label class="font-semibold text-[18px] text-[#000]" for="password" value="{{ __('Password *') }}" />
                <input id="password" class="block mt-3 w-full rounded-none text-[15px] border-gray-300 focus:border-[#000] focus:ring-[#000]" type="password" name="password" placeholder="Enter Password" required autocomplete="current-password" />
            </div>

            <div class="flex mt-4">
                <div class="flex-grow mt-1">
                    <label for="remember_me" class="flex items-center">
                        <input type="checkbox" id="remember_me" name="remember" class="focus:ring-0 focus:outline-none bg-gray-50 rounded-[4px] cursor-pointer text-black"/>
                        <span class="text-[14px] text-[#000] ml-2">{{ __('Remember me') }}</span>
                    </label>
                </div>                

                <div class="flex-shrink">
                    @if (Route::has('password.request'))
                        <a class="underline text-[14px] text-[#000]" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                </div>                
            </div>

            <div class="mt-8">                
                <button type="submit" class="w-full inline-block items-center px-4 py-2 bg-[#000] border border-transparent rounded-none  text-[15px] text-white tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-[#000] focus:ring-offset-2 transition ease-in-out duration-150 ">
                    {{ __('Log In') }}
                </button>
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
