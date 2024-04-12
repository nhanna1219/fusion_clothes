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
        <div class="flex gap-x-10 p-10">
            <div class="flex flex-col gap-y-4 w-[150px] text-[20px] font-bold">
                <div class="">Filter Options</div> 
                <div class="h-[1.5px] bg-[#C9C9C9] opacity-60"></div>
                <div class="flex flex-col gap-y-3">
                    <div>Category</div>
                    <div class="flex flex-col gap-y-2 font-normal text-[16px]">
                        <div class="flex gap-x-4 items-center">
                            <input type="checkbox" name="" id="" class="rounded-[4px]">
                            <div>Men</div>
                        </div>
                        <div class="flex gap-x-4 items-center">
                            <input type="checkbox" name="" id="" class="rounded-[4px]">
                            <div>Women</div>
                        </div>
                        <div class="flex gap-x-4 items-center">
                            <input type="checkbox" name="" id="" class="rounded-[4px]">
                            <div>T-Shirts</div>
                        </div>
                        <div class="flex gap-x-4 items-center">
                            <input type="checkbox" name="" id="" class="rounded-[4px]">
                            <div>Handbags</div>
                        </div>
                        <div class="flex gap-x-4 items-center">
                            <input type="checkbox" name="" id="" class="rounded-[4px]">
                            <div>Jackets and Coats</div>
                        </div>
                        <div class="flex gap-x-4 items-center">
                            <input type="checkbox" name="" id="" class="rounded-[4px]">
                            <div>Watches</div>
                        </div>
                        <div class="flex gap-x-4 items-center">
                            <input type="checkbox" name="" id="" class="rounded-[4px]">
                            <div>Hat</div>
                        </div>
                    </div>
                </div>
                <div class="h-[1.5px] bg-[#C9C9C9] opacity-60"></div>
                <div class="flex flex-col gap-y-3">
                    <div>Price</div>
                </div>
            </div>
            <div class="flex gap-x-4 gap-y-6 flex-wrap">
            @php
                $product_name = 'Trendy Black Coat';
                $product_rating = '4.8';
                $product_type = 'Coats';
                $product_price = '$75.00';
            @endphp
                <x-product-item :product-type="$product_type" :product-rating="$product_rating" $product-name="$product_name" :product-price="$product_price" />
            </div>
        </div>
    </div>
</x-app-layout>
