<x-app-layout>
    <x-slot name="header"></x-slot>
    <div>
        <div class="bg-[#f5f5f5] w-full h-[150px] flex flex-col justify-center items-center relative z-10 overflow-hidden">
            <img src="{{asset ('storage/background_pattern.png')}}" alt="" class="absolute w-[20%] min-w-[150px] max-w-[200px] bottom-[-10%] left-[10%] z-0">
            <img src="{{asset ('storage/background_pattern.png')}}" alt="" class="absolute w-[20%] min-w-[150px] max-w-[200px] top-[-10%] right-[10%] z-0">
            <div class="flex flex-col gap-y-3 justify-center items-center">
                <div class="font-bold text-[28px]">Checkout</div>
                <div class="text-[#636363]">Home / Shopping Cart / Checkout</div>
            </div>
        </div>

        <form class="" method="POST" action="{{url('/momo_payment')}}">
            @csrf
            <button type="submit" name="payUrl">Thanh toán Momo</button>

        </form>
    </div>

</x-app-layout>