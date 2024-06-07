<div class="relative w-full flex justify-center">
    <div class="flex rounded overflow-hidden w-full">
        <label for="search-input" class="flex items-center">
            <svg width="20" height="20" viewBox="0 0 20 20">
                <path d="M14.386 14.386l4.0877 4.0877-4.0877-4.0877c-2.9418 2.9419-7.7115 2.9419-10.6533 0-2.9419-2.9418-2.9419-7.7115 0-10.6533 2.9418-2.9419 7.7115-2.9419 10.6533 0 2.9419 2.9418 2.9419 7.7115 0 10.6533z" stroke="#64748b" fill="none" stroke-width="2" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </label>
        <input id="search-input" wire:model.live.debounce.50ms="query" wire:keydown.enter="redirectToShop" class="w-full border-none focus:ring-0 focus:outline-none ml-[.75rem] mr-[1rem]" type="text" placeholder="Search product" autocomplete="off">
    </div>
    <div class="absolute mt-16 w-[80%] overflow-hidden rounded-md bg-white" style="box-shadow: 0 1rem 1rem rgba(0, 0, 0, .2);">
        @foreach ($products as $product)
            <div>
                <a href="{{ route('customer.products.details', $product->id) }}">
                    <div class="flex items-center px-3 py-2 hover:bg-gray-100">
                        <img src="{{ asset($product->images->first()->image_path) }}" alt="" class="w-10 h-10 rounded-full">
                        <div class="ml-3">
                            <p class="text-sm font-semibold">{{ $product->name }}</p>
                            <p class="text-sm text-gray-500">${{ $product->price }}</p>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>
