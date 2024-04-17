@props(['type' => 'card'])
<div {{ $attributes->class(['relative grid w-full max-w-60 flex-col overflow-hidden place-items-center rounded-lg border border-gray-100 bg-white shadow-md', "before:absolute before:content-[''] before:z-0 before:w-[50%] before:h-[180%] before:rotate-[30deg] before:bg-[#0A0A0A] hover:before:block hover:before:animate-[spinAround_.5s_linear] after:absolute after:content-[''] after:inset-[3px] after:rounded-[6px] after:bg-white after:z-0" => $type === "product"])}}>
    <a class="mx-3 mt-3 flex h-60 overflow-hidden rounded-xl relative z-10" href="#">
        <img class="object-cover"
            src="{{ asset('storage/product_image.png')}}"
            alt="product image" />
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
        <a href="#" class="flex items-center justify-center rounded-md bg-slate-900 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-blue-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
            </svg>
            Add to cart
        </a>
    </div>
</div>