@props(['product_type', 'product_rating', 'product_name', 'product_price'])
<div class="flex flex-col w-[200px] text-[16px]">
    <img src="{{asset ('storage/product_image.png')}}" alt="">
    <div class="flex items-center justify-between">
        <div class="text-[#818181] text-[14px]">{{ $product_type }}</div>
        <div class="flex gap-x-1 items-center">
            <img src="{{asset ('storage/ic_round-star.png')}}" alt="">
            <div class="font-medium text-[14px]">{{ $product_rating }}</div>
        </div>
    </div>
    <div class="font-bold">
            {{ $product_name }}
    </div>
    <div class="font-bold">
        {{ $product_price }}
    </div>
</div>