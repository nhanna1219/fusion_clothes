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

        <h2 class="font-bold text-[25px] pt-16 pl-24 pb-12">Billing Details</h2>
        <div class="flex">
            <div class="pl-24 w-[55%] ">
                <div class="flex flex-row pb-10">
                    <div class=" w-[60%]">
                        <div class="text-[20px] font-medium pb-4">First Name *</div>
                        <input required class="border-solid rounded w-[80%]" placeholder="Đạt">
                    </div>

                    <div class="w-[50%]">
                        <div class="text-[20px] font-medium pb-4">Last Name *</div>
                        <input required class="border-solid rounded w-[100%]" placeholder="Hoàng">
                    </div>
                </div>
                <div class="pb-10">
                    <div class="text-[20px] font-medium pb-4">Country *</div>
                    <select class="w-[100%] border border-gray-300 rounded px-3 py-2.5 text-gray-700 " placeholder="Select country">
                        <option value="Vietnam">Viet Nam</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                <div class="pb-10">
                    <div class="text-[20px] font-medium pb-4">City *</div>
                    <select class="w-[100%] border border-gray-300 rounded px-3 py-2.5 text-gray-700 " placeholder="Select country">
                        <option value="HCM">Ho Chi Minh City</option>
                        <option value="HN">Ha Noi</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                <div class="pb-10">
                    <div class="text-[20px] font-medium pb-4">District *</div>
                    <select class="w-[100%] border border-gray-300 rounded px-3 py-2.5 text-gray-700 " placeholder="Select country">
                        <option value="district1">District 1</option>
                        <option value="Other">Khác</option>
                    </select>
                </div>
                <div class="pb-10">
                    <div class="text-[20px] font-medium pb-4">Address *</div>
                    <input required class="border-solid rounded w-[100%]" placeholder="Enter address">
                </div>
                <div class="pb-10">
                    <div class="text-[20px] font-medium pb-4">Phone *</div>
                    <input required class="border-solid rounded w-[100%]" placeholder="098...">
                </div>
                <div class="pb-10">
                    <div class="text-[20px] font-medium pb-4">Email *</div>
                    <input required class="border-solid rounded w-[100%]" placeholder="Enter email">
                </div>
            </div>
            <div class="pl-28">
                <div class="border-solid border-2 w-[230%] h-[50%] ">
                    <p class="font-bold text-[23px] pt-6 pl-6 pb-6">Order Summary</p>
                    <div class="w-[90%] pl-14">
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>