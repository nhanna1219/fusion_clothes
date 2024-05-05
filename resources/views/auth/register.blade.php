<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />
        <div class="flex flex-col gap-y-3 items-center font-bold text-[35px] text-[#000]">Sign Up</div>            

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-label for="name"  value="{{ __('Name') }}" />
                <x-input id="username" placeholder="Enter Your Name" type="text" name="username" :value="old('name')" required  autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="email"  value="{{ __('Email') }}" />
                <x-input id="email"  placeholder="Enter Email Address" type="email" name="email" :value="old('email')" required autocomplete="email" />
            </div>

            <div class="mt-4">
                <x-label for="password"  value="{{ __('Password') }}" />
                <x-input id="password"  placeholder="Enter Password" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" placeholder="Enter Password" type="password" name="password_confirmation" required autocomplete="new-password" />
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

            <div class="flex items-center justify-end mt-4 ">
                <x-button href="{{ route('login') }}">
                    {{ __('Sign Up') }}
                </x-button>
            </div>
            <div class="text-center mt-4">
                <span class="text-[14px] text-[#000] ml-2 inline-flex và items-center">{{ __("Already have an account?") }}</span>
                <a class="underline text-[14px] text-[#000] font-bold hover:text-gray-900 rounded-md focus:outline-none " href="{{ route('login') }}">
                    {{ __('Log In') }}
                </a>
            </div>
            
        </form>
    </x-authentication-card>
</x-guest-layout>