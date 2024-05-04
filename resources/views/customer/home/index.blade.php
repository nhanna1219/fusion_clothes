@php
    $splitIndex = ceil($products->count() / 2);
@endphp
<x-app-layout>
    <x-slot name="header"></x-slot>
    <div class="flex w-full h-[89vh] relative">
        <img src="{{ asset('storage/banner-clothes.jpg') }}" class="w-full h-full object-cover" alt="">
        <div
            class="absolute inset-0 flex flex-col justify-center items-center text-center text-white pb-16 slide-fade-in">
            <img src="{{ asset('storage/light-logo.png') }}" alt="Logo" class="h-44">
            <h1 class="mb-2 text-xl font-bold">
                Dress to Express - Your Style, Your Statement
            </h1>
            <span class="text-xs ">
                The intersection where classic style meets modern flair
            </span>
            <a href="#new-arrival"
                class="bg-white transition ease-in-out duration-300 hover:scale-110 hover:bg-gray-300 ms-[325px] border border-gray-400 text-black shadow rounded font-bold p-2 mt-10 drop-shadow-md">
                SHOP NOW
            </a>
        </div>
    </div>
    <div class="feature-section flex justify-between items-center container mx-auto px-28 h-36">
        <div class="flex">
            <img src="{{ asset('storage/package-icon.png') }}" alt="" width="45" height="45">
            <div class="ms-3 text-center">
                <h3 class="font-bold featured-text">Free shipping</h3>
                <span class="text-[10px]">Free shipping for order above 150$</span>
            </div>
        </div>
        <div class="flex">
            <img src="{{ asset('storage/payment-icon.png') }}" alt="" width="45" height="45">
            <div class="ms-3 text-center">
                <h3 class="font-bold featured-text">Flexible payment</h3>
                <span class="text-[10px]">Multiple secure payment options</span>
            </div>
        </div>
        <div class="flex">
            <img src="{{ asset('storage/support-icon.png') }}" alt="" width="45" height="45">
            <div class="ms-3 text-center">
                <h3 class="font-bold featured-text">24x7 Support</h3>
                <span class="text-[10px]">We support online all days</span>
            </div>
        </div>
    </div>

    <div id="new-arrival" class="container">
        <div class="mx-auto px-32 py-10">
            <!-- New Arrival Section -->
            <div class="flex text-center justify-center items-center pb-6">
                <h1 class="font-bold border-2 rounded-lg border-black px-24 py-2 shadow-xl">New Arrival</h1>
            </div>
            <!-- Slider main container -->
            <div class="swiper">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper px-10 py-12">
                    <!-- Slides -->
                    @foreach ($products as $index => $product)
                        @if ($index < $splitIndex)
                            <div class="swiper-slide">
                                <x-product-item
                                    usage="new-arrival"
                                    id="product-item-{{ $product->id }}"
                                    image="{{ $product->images->first()->image_path }}"
                                    type="{{ $product->category->name }}"
                                    rating="4"
                                    price="{{ $product->price }}"
                                    name="{{ $product->name }}"
                                />
                            </div>
                        @endif
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>
    </div>

    <div id="best-seller" class="container">
        <div class="mx-auto px-32 py-10">
            <!-- New Arrival Section -->
            <div class="flex text-center justify-center items-center pb-6">
                <h1 class="font-bold border-2 rounded-lg border-black px-24 py-2 shadow-xl">Our Best Seller</h1>
            </div>
            @if (isset($product))
            @endif
            <!-- Slider main container -->
            <div class="swiper">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper px-10 py-12">
                    <!-- Slides -->
                    @foreach ($products as $index => $product)
                        @if ($index >= $splitIndex)
                            <div class="swiper-slide">
                                <x-product-item
                                    usage="best-seller"
                                    id="product-item-{{ $product->id }}"
                                    image="{{ $product->images->first()->image_path }}"
                                    type="{{ $product->category->name }}"
                                    rating="4"
                                    price="{{ $product->price }}"
                                    name="{{ $product->name }}"
                                />
                            </div>
                        @endif
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>

                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>
    </div>

    <div id="testimonial" class="mx-auto px-32 py-10">
        <h1 class="text-4xl font-semibold">What our clients say</h1>
        <div class="video-testimonial flex mt-14">
            <div class="w-1/4 opacity-0 transition-opacity duration-500 ease-in-out item delay-100">
                <!-- Testimonial Column -->
                <div class="bg-white p-6 shadow-lg rounded-t-md rounded-b-none w-[281px] border-black">
                    <p class="text-gray-600 italic">"Fusion offers stylish options without breaking the bank. It's
                        my secret spot for finding hidden gems."</p>
                    <div class="mt-4 ms-auto w-fit">
                        <h2 class="text-sm font-semibold">Emily Taylor</h2>
                    </div>
                </div>

                <!-- Video Column -->
                <video controls class="h-[500px] shadow-lg rounded-t-none rounded-b-md" loop autoplay muted>
                    <source src="{{ asset('storage/testimonial1.mp4') }}" type="video/mp4">
                </video>
            </div>
            <div class="w-1/4 opacity-0 transition-opacity duration-500 ease-in-out item delay-200">
                <!-- Video Column -->
                <video controls class="h-[500px] shadow-lg rounded-t-md rounded-b-none" loop autoplay muted>
                    <source src="{{ asset('storage/testimonial2.mp4') }}" type="video/mp4">
                </video>
                <!-- Testimonial Column -->
                <div class="bg-white p-6 shadow-lg rounded-t-none rounded-b-md w-[281px] border-black">
                    <p class="text-gray-600 italic">"Absolutely in love with Fusion! Every item is a fashion statement
                        that turns heads."</p>
                    <div class="mt-4 ms-auto w-fit">
                        <h2 class="text-sm font-semibold">Emma Watson</h2>
                    </div>
                </div>
            </div>
            <div class="w-1/4 opacity-0 transition-opacity duration-500 ease-in-out item delay-300">
                <!-- Testimonial Column -->
                <div class="bg-white p-6 shadow-lg rounded-t-md rounded-b-none w-[281px] border-black">
                    <p class="text-gray-600 italic">"Fusion is my go-to for style and comfort. Their pieces always feel
                        tailor-made for me!"</p>
                    <div class="mt-4 ms-auto w-fit">
                        <h2 class="text-sm font-semibold">Michael Johnson</h2>
                    </div>
                </div>

                <!-- Video Column -->
                <video controls class="h-[500px] shadow-lg rounded-t-none rounded-b-md" loop autoplay muted>
                    <source src="{{ asset('storage/testimonial3.mp4') }}" type="video/mp4">
                </video>
            </div>
            <div class="w-1/4 opacity-0 transition-opacity duration-500 ease-in-out item delay-500">
                <!-- Video Column -->
                <video controls class="h-[500px] shadow-lg rounded-t-md rounded-b-none  " loop autoplay muted>
                    <source src="{{ asset('storage/testimonial4.mp4') }}" type="video/mp4">
                </video>
                <!-- Testimonial Column -->
                <div class="bg-white p-6 shadow-lg rounded-t-none rounded-b-md w-[281px] border-black">
                    <p class="text-gray-600 italic">"Fusion's clothing line blends quality with the latest
                        trends—always spot on!"</p>
                    <div class="mt-4 ms-auto w-fit">
                        <h2 class="text-sm font-semibold">David Smith</h2>
                    </div>
                </div>
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
