<x-guest-layout>
    <x-authentication-card>

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="flex flex-col gap-y-3 items-center font-bold text-[35px] text-[#000]">Sign Up</div>
            
            <div>
                <x-label class="font-semibold text-[18px] text-[#000]" for="name" value="{{ __('Name') }}" />
                <input id="name" class="block mt-2 w-full rounded-none text-[15px] border-gray-300 focus:border-[#000] focus:ring-[#000]" placeholder="Enter Your Name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-label class="font-semibold text-[18px] text-[#000]" for="email" value="{{ __('Email') }}" />
                <input id="email" class="block mt-2 w-full rounded-none text-[15px] border-gray-300 focus:border-[#000] focus:ring-[#000]" placeholder="Enter Email Address" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label class="font-semibold text-[18px] text-[#000]" for="phone" value="{{ __('Phone') }}" />
                <input id="email" class="block mt-2 w-full rounded-none text-[15px] border-gray-300 focus:border-[#000] focus:ring-[#000]" placeholder="Enter Phone Number" type="email" name="email" :value="old('email')" required autocomplete="phone" />
            </div>

            <div class="mt-4">
                <x-label class="font-semibold text-[18px] text-[#000]" for="password" value="{{ __('Password') }}" />
                <input id="password" class="block mt-2 w-full rounded-none text-[15px] border-gray-300 focus:border-[#000] focus:ring-[#000]" placeholder="Enter Password" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label class="font-semibold text-[18px] text-[#000]" for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <input id="password_confirmation" class="block mt-2 w-full rounded-none text-[15px] border-gray-300 focus:border-[#000] focus:ring-[#000]" placeholder="Enter Password" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ms-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-6">                
                <button type="submit" class="w-full inline-block items-center px-4 py-2 bg-[#000] border border-transparent rounded-none  text-[15px] text-white tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-[#000] focus:ring-offset-2 transition ease-in-out duration-150 ">
                     {{ __('Sign Up') }}
                </button>
            </div>

            <div class="mt-10 text-center">
                <span class="text-[14px] text-[#000] ml-2">{{ __("Already have an account?") }}</span>

                <a class="underline text-[14px] text-[#000] font-bold hover:text-gray-900 rounded-md focus:outline-none " href="{{ route('login') }}">
                    {{ __('Log In') }}
                </a>

            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
