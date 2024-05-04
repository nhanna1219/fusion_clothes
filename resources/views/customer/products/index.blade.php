<x-app-layout>
    <x-slot name="header"></x-slot>

    <div>
        <div class="bg-[#f5f5f5] w-full h-[150px] flex flex-col justify-center items-center relative z-10 overflow-hidden">
            <img src="{{asset ('storage/background_pattern.png')}}" alt="" class="absolute w-[20%] min-w-[150px] max-w-[200px] bottom-[-10%] left-[10%] z-0">
            <img src="{{asset ('storage/background_pattern.png')}}" alt="" class="absolute w-[20%] min-w-[150px] max-w-[200px] top-[-10%] right-[10%] z-0">
            <div class="flex flex-col gap-y-3 justify-center items-center">
                <div class="font-bold text-[28px]">Shop</div>
                <div class="text-[#636363]">Home / Shop</div>
            </div>
        </div>
        <div class="flex gap-x-10 py-10 px-28">
            <div class="flex flex-col gap-y-4 text-[20px] font-bold">
                <div class="">Filter Options</div>
                <div class="h-[1.5px] bg-[#C9C9C9] opacity-60"></div>
                <div class="flex flex-col gap-y-3">
                    <div>Category</div>
                    <div class="flex flex-col gap-y-2 font-normal text-[16px]">
                        <div class="flex gap-x-4 items-center caret-transparent">
                            <input type="checkbox" id="men-filtered" class="focus:ring-0 focus:outline-none bg-gray-50 rounded-[4px] cursor-pointer text-black">
                            <label for="men-filtered" class="select-none">Men</label>
                        </div>
                        <div class="flex gap-x-4 items-center caret-transparent">
                            <input type="checkbox" id="women-filtered" class="focus:ring-0 focus:outline-none bg-gray-50 rounded-[4px] cursor-pointer text-black">
                            <label for="women-filtered" class="select-none">Women</label>
                        </div>
                        <div class="flex gap-x-4 items-center caret-transparent">
                            <input type="checkbox" id="tee-filtered" class="focus:ring-0 focus:outline-none bg-gray-50 rounded-[4px] cursor-pointer text-black">
                            <label for="tee-filtered" class="select-none">T-Shirts</label>
                        </div>
                        <div class="flex gap-x-4 items-center caret-transparent">
                            <input type="checkbox" id="handbag-filtered" class="focus:ring-0 focus:outline-none bg-gray-50 rounded-[4px] cursor-pointer text-black">
                            <label for="handbag-filtered" class="select-none">Handbags</label>
                        </div>
                        <div class="flex gap-x-4 items-center caret-transparent">
                            <input type="checkbox" id="jacket-filtered" class="focus:ring-0 focus:outline-none bg-gray-50 rounded-[4px] cursor-pointer text-black">
                            <label for="jacket-filtered" class="select-none">Jackets</label>
                        </div>
                        <div class="flex gap-x-4 items-center caret-transparent">
                            <input type="checkbox" id="watch-filtered" class="focus:ring-0 focus:outline-none bg-gray-50 rounded-[4px] cursor-pointer text-black">
                            <label for="watch-filtered" class="select-none">Watches</label>
                        </div>
                        <div class="flex gap-x-4 items-center caret-transparent">
                            <input type="checkbox" id="hat-filtered" class="focus:ring-0 focus:outline-none bg-gray-50 rounded-[4px] cursor-pointer text-black">
                            <label for="hat-filtered" class="select-none">Hat</label>
                        </div>
                    </div>
                </div>
                <div class="h-[1.5px] bg-[#C9C9C9] opacity-60"></div>
                <div>
                    <div class="flex flex-col gap-y-3 mb-3">
                        <div>Price</div>
                        <div id="price" class="flex font-normal text-[#4A4A4A] text-base">
                            <span id="min-value">$0.00</span>
                            <div class="ml-1 mr-1">-</div>
                            <span id="max-value">$1000.00</span>
                        </div>
                    </div>
                    <div id="slider" class="relative h-[5px] bg-[#C9C9C9] rounded-[5px]">
                        <div id="progress" class="h-full left-0 right-0 absolute rounded-[5px] bg-[#0A0A0A]"></div>
                    </div>
                    <div id="range-input" class="relative">
                        <input type="range" id="range-min" min="0" max="1000" value="0" step="10">
                        <input type="range" id="range-max" min="0" max="1000" value="1000" step="10">
                    </div>
                </div>
            </div>
            <div class="flex flex-col ml-20 gap-y-10 w-full">
                <div class="flex flex-col gap-y-5">
                    <div class="flex justify-between items-center">
                        <div>Showing 1-12 of 240 results</div>
                        <div>
                            Sort by: 
                            <select name="" id="sorting">
                                <option value="Price" selected>Price</option>
                                <option value="Name">Name</option>
                            </select>
                        </div>
                    </div>
                    <div class="flex gap-5 items-center flex-wrap min-h-10" id="filter-container">
                        <div>Active Filter</div>
                        <template id="filter-template">
                            <x-filter-item/>
                        </template>
                        <div class="underline cursor-pointer" id="clear-filter">Clear All</div>
                    </div>
                </div>
                <div class="flex gap-x-7 gap-y-8 flex-wrap min-h-60" id="product-container">
                    @foreach ($paginationItems as $product)
                        <x-product-item id="product-item" usage="product" image="{{ asset('storage/'.$product['image']) }}" type="{{ $product['type'] }}" rating="{{ $product['rating'] }}" price="{{ $product['price'] }}" name="{{ $product['name'] }}"/>
                    @endforeach
                </div>
                <div class="mt-5 flex justify-center">
                    <nav class="relative z-0 inline-flex rounded-md -space-x-px" aria-label="Pagination">
                        @if ($paginationItems->previousPageUrl())
                            <a href="{{ $paginationItems->previousPageUrl() }}" class="relative inline-flex items-center px-2 py-2 border-none bg-white text-sm font-bold text-gray-500">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                                </svg>
                            </a>
                        @else
                            <span class="relative inline-flex items-center px-2 py-2 border-none bg-white text-sm font-bold text-gray-500 cursor-not-allowed">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                                </svg>
                            </span>
                        @endif

                        @if ($paginationItems->currentPage() > 3)
                            <a href="{{ $paginationItems->url(1) }}" class="relative inline-flex items-center px-4 py-2 border-none bg-white text-xl font-bold text-gray-700 hover:bg-gray-300">1</a>
                        @endif

                        @if ($paginationItems->currentPage() > 4)
                            <span class="relative inline-flex items-center px-4 py-2 border-none bg-white text-xl font-bold text-gray-700">{{ '...' }}</span>
                        @endif

                        @foreach (range(1, $paginationItems->lastPage()) as $i)
                            @if ($i >= $paginationItems->currentPage() - 2 && $i <= $paginationItems->currentPage() + 2)
                                @if ($i == $paginationItems->currentPage())
                                    <a class="relative inline-flex items-center px-4 py-2 border-none text-xl font-bold text-gray-700 hover:bg-gray-300 bg-gray-300 }}">{{ $i }}</a>
                                @else
                                    <a href="{{ $paginationItems->url($i) }}" class="relative inline-flex items-center px-4 py-2 border-none bg-white text-xl font-bold text-gray-700 hover:bg-gray-300">{{ $i }}</a>
                                @endif
                            @endif
                        @endforeach

                        @if ($paginationItems->currentPage() < $paginationItems->lastPage() - 3)
                            <span class="relative inline-flex items-center px-4 py-2 border-none bg-white text-xl font-bold text-gray-700">{{ '...' }}</span>
                        @endif

                        @if ($paginationItems->currentPage() < $paginationItems->lastPage() - 2)
                            <a href="{{ $paginationItems->url($paginationItems->lastPage()) }}" class="relative inline-flex items-center px-4 py-2 border-none bg-white text-xl font-bold text-gray-700 hover:bg-gray-300 {{ ($paginationItems->currentPage() == $i) ? 'bg-gray-300' : '' }}">{{ $paginationItems->lastPage() }}</a>
                        @endif

                        @if ($paginationItems->nextPageUrl())
                            <a href="{{ $paginationItems->nextPageUrl() }}" class="relative inline-flex items-center px-2 py-2 border-none bg-white text-sm font-bold text-gray-500">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                                </svg>
                            </a>
                        @else
                            <span class="relative inline-flex items-center px-2 py-2 border-none bg-white text-sm font-bold text-gray-500 cursor-not-allowed">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                                </svg>
                            </span>
                        @endif
                    </nav>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
