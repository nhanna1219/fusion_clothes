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
                            <input type="checkbox" id="jnc-filtered" class="focus:ring-0 focus:outline-none bg-gray-50 rounded-[4px] cursor-pointer text-black">
                            <label for="jnc-filtered" class="select-none">Jackets and Coats</label>
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
                            <span id="min-value">$25.00</span>
                            <div class="ml-1 mr-1">-</div>
                            <span id="max-value">$125.00</span>
                        </div>
                    </div>
                    <div id="slider" class="relative h-[5px] bg-[#C9C9C9] rounded-[5px]">
                        <div id="progress" class="h-full left-1/4 right-1/4 absolute rounded-[5px] bg-[#0A0A0A]"></div>
                    </div>
                    <div id="range-input" class="relative">
                        <input type="range" id="range-min" min="0" max="1000" value="100" step="10">
                        <input type="range" id="range-max" min="0" max="1000" value="500" step="10">
                    </div>
                </div>
            </div>
            <div class="flex flex-col ml-20 gap-y-10">
                <div class="flex flex-col gap-y-5">
                    <div class="flex justify-between items-center">
                        <div>Showing 1-12 of 240 results</div>
                        <div>
                            Sort by: 
                            <select name="" id="">
                                <option value="Default Sorting">Default Sorting</option>
                            </select>
                        </div>
                    </div>
                    <div class="flex gap-5 items-center flex-wrap" id="filter-container">
                        <div>Active Filter</div>
                        <template id="filter-template">
                            <x-filter-item/>
                        </template>
                        <div class="underline cursor-pointer" id="clear-filter">Clear All</div>
                    </div>
                </div>
                <div class="flex gap-x-7 gap-y-8 flex-wrap">
                    <x-product-item type="product"/>
                    <x-product-item type="product"/>
                    <x-product-item type="product"/>
                    <x-product-item type="product"/>
                    <x-product-item type="product"/>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
