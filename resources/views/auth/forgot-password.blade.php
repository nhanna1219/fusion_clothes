<x-guest-layout>
    <x-authentication-card>
        <div class="flex flex-col gap-y-3 items-center font-bold text-[35px] text-[#000]">Forgot Password?</div>            

        <div class="mb-4 text-sm text-gray-500">
            {{ __("Don't worry! Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.") }}
        </div>

        <x-validation-errors class="mb-6" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="block">
                <x-label class="font-semibold text-[18px] text-[#000]" for="email" value="{{ __('Email *') }}" />
                <input id="email" class="block mt-3 w-full rounded-none text-[15px] border-gray-400 focus:border-[#000] focus:ring-[#000]" type="email" name="email" placeholder="Enter Email Address" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="flex items-center justify-end mt-6">
                <button type="submit" class="w-full inline-block items-center px-4 py-2 bg-[#000] border border-transparent rounded-none  text-[15px] text-white tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-[#000] focus:ring-offset-2 transition ease-in-out duration-150 ">
                    {{ __('Email Password Reset Link') }}
                </button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
