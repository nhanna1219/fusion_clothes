@props(['type' => 'card'])
<div
{{ $attributes->class([
    'relative grid w-full max-w-60 flex-col overflow-hidden place-items-center rounded-lg border border-gray-100 bg-white shadow-md',
    $type === 'product' ? "before:absolute before:content-[''] before:z-0 before:w-[50%] before:h-[180%] before:rotate-[30deg] before:bg-[#0A0A0A] hover:before:block hover:before:animate-[spinAround_.5s_linear] after:absolute after:content-[''] after:inset-[3px] after:rounded-[6px] after:bg-white after:z-0" : '',
    ($type === 'new-arrival' || $type === 'best-seller') ? 'transform transition duration-500 hover:scale-105' : '',
]) }}>
    <a class="mx-3 mt-3 flex h-50 overflow-hidden rounded-xl relative z-10" href="#">
        @if ($type === 'new-arrival')
            <img src="{{ asset('storage/new-arrival-ic.png') }}" class="absolute" width="45" height="45"
                alt="">
        @elseif($type === 'best-seller')
            <img src="{{ asset('storage/best-seller-ic.png') }}" class="absolute mt-2 ms-3" width="30" height="30"
                alt="">
        @endif

        <img class="object-cover" src="{{ asset('storage/product_image.png') }}" alt="product image" />
    </a>
    <div class="mt-2 px-4 pb-3 w-full z-10">
        <a href="#">
            <h3 class="text-sm font-medium text-[#616161]">
                Coats
            </h3>
        </a>
        <a href="#">
            <h5 class="tracking-tight font-bold text-base text-slate-900">Trendy Black Coat</h5>
        </a>
        <div class="mt-2 mb-3 flex items-center justify-between">
            <p>
                <span class="text-base font-bold text-slate-900">$75.00</span>
            </p>
            <div class="flex items-center">
                <svg aria-hidden="true" class="h-5 w-5 text-yellow-300" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                    </path>
                </svg>
                <span class="ml-2 rounded bg-yellow-200 px-2.5 py-0.5 text-xs font-semibold">4.8</span>
            </div>
        </div>

        <div class="flex justify-between">
            <a href="#"
                class="flex items-center justify-center rounded-md bg-stone-950 px-3 py-2 text-center text-[0.6rem] font-medium text-white hover:bg-stone-800 focus:outline-none focus:ring-4 focus:ring-blue-300 transition duration-300 ease-in-out">
                <svg xmlns="http://www.w3.org/2000/svg" class="mr-1 h-4 w-6 fill-white" viewBox="0 0 24 24">
                    <g data-name="Layer 2">
                        <g data-name="shopping-bag">
                            <rect width="24" height="24" opacity="0" />
                            <path
                                d="M20.12 6.71l-2.83-2.83A3 3 0 0 0 15.17 3H8.83a3 3 0 0 0-2.12.88L3.88 6.71A3 3 0 0 0 3 8.83V18a3 3 0 0 0 3 3h12a3 3 0 0 0 3-3V8.83a3 3 0 0 0-.88-2.12zm-12-1.42A1.05 1.05 0 0 1 8.83 5h6.34a1.05 1.05 0 0 1 .71.29L17.59 7H6.41zM18 19H6a1 1 0 0 1-1-1V9h14v9a1 1 0 0 1-1 1z" />
                            <path d="M15 11a1 1 0 0 0-1 1 2 2 0 0 1-4 0 1 1 0 0 0-2 0 4 4 0 0 0 8 0 1 1 0 0 0-1-1z" />
                        </g>
                    </g>
                </svg>
                Buy now
            </a>
            <a href="#"
                class="flex items-center justify-center rounded-md bg-neutral-800 px-3 py-2 text-center text-[0.6rem] font-medium text-white hover:bg-neutral-600 focus:outline-none focus:ring-4 focus:ring-blue-300 transition duration-300 ease-in-out ml-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="mr-1 h-4 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
                Add to cart
            </a>
        </div>
    </div>
</div>
