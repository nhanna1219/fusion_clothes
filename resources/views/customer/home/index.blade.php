<x-app-layout>
    <x-slot name="header"></x-slot>
    <div class="flex w-full h-[89vh] relative">
        <img src="{{asset ('storage/banner-clothes.jpg')}}" class="w-full h-full object-cover" alt="">
        <div class="absolute inset-0 flex flex-col justify-center items-center text-center text-white pb-16 slide-fade-in">
            <img src="{{ asset('storage/light-logo.png') }}" alt="Logo" class="h-44">
            <h1 class="mb-2 text-xl font-bold">
                Dress to Express - Your Style, Your Statement
            </h1>
            <span class="text-xs ">
                The intersection where classic style meets modern flair
            </span>
            <button class="bg-white transition ease-in-out duration-300 hover:scale-110 hover:bg-gray-300 ms-[325px] border border-gray-400 text-black shadow rounded font-bold p-2 mt-10">SHOP NOW</button>
        </div>

    </div>

    {{-- <div>
        <h1>Home Page</h1>
        @guest
            <p>Welcome! Feel free to <a href="{{ route('login') }}">login</a> or <a href="{{ route('register') }}">register</a>.</p>
        @endguest

        @auth
            <p>Welcome back, {{ Auth::user()->name }}!</p>
        @endauth
    </div> --}}

    {{-- Testimonial --}}
    {{-- <video class="mx-auto" width="300" height="240" autoplay>
        <source src="{{asset ('storage/Snapinsta.app_video_318846414_1147318316261636_7364778221521439841_n.mp4')}}" type="video/mp4">
    </video> --}}
</x-app-layout>
