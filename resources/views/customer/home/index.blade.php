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
            <button class="bg-white transition ease-in-out duration-300 hover:scale-110 hover:bg-gray-300 ms-[325px] border border-gray-400 text-black shadow rounded font-bold p-2 mt-10 drop-shadow-md">SHOP NOW</button>
        </div>

    </div>
    <div class="feature-section flex justify-between items-center container mx-auto px-28 h-36">
        <div class="flex">
            <img src="{{ asset('storage/package-icon.png')}}" alt="" width="45" height="45">
            <div class="ms-3 text-center">
                <h3 class="font-bold featured-text">Free shipping</h3>
                <span class="text-[10px]">Free shipping for order above 150$</span>
            </div>
        </div>
        <div class="flex">
            <img src="{{ asset('storage/payment-icon.png')}}" alt="" width="45" height="45">
            <div class="ms-3 text-center">
                <h3 class="font-bold featured-text">Flexible payment</h3>
                <span class="text-[10px]">Multiple secure payment options</span>
            </div>
        </div>
        <div class="flex">
            <img src="{{ asset('storage/support-icon.png')}}" alt="" width="45" height="45">
            <div class="ms-3 text-center">
                <h3 class="font-bold featured-text">24x7 Support</h3>
                <span class="text-[10px]">We support online all days</span>
            </div>
        </div>
    </div>

    <div class="container new-arrival">
        <div class="mx-auto px-28">
            <!-- New Arrival Section -->
            <div class="flex text-center justify-center items-center pt-12 pb-10">
                <h1 class="font-bold border-2 rounded-lg border-black px-24 py-2 shadow-xl">New Arrival</h1>
            </div>
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
