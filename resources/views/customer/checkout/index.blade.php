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
                <div class="text-[20px] font-medium pb-4">Delivery Address *</div>
                <div class="flex flex-row pb-10">

                    <div class="flex items-center w-[45%] h-12 border-solid border-2 rounded">
                        <label class="cursor-pointer pl-3">
                            <input type="radio" id="same" name="address">
                            <label for="same" class="text-[18px] pl-3 cursor-pointer">Same as shipping address</label>
                        </label>
                    </div>
                    <div class="pl-14 w-[55%]">
                        <div class="flex items-center h-12 border-solid border-2 rounded">
                            <label class="cursor-pointer pl-3">
                                <input type="radio" id="diff" name="address">
                                <label for="diff" class="text-[18px] pl-3 cursor-pointer">Using a different billing address</label>
                            </label>
                        </div>
                    </div>
                </div>
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
                    <div class="w-[90%] pl-14 pb-8">
                        <hr>
                    </div>
                    <div class="pl-6 ">
                        <table class=" text-left">
                            <tr>
                                <th class="text-[#c9c9c9] w-[85%]">Item</th>
                                <td class="w-fit text-right">8</td>
                            </tr>
                            <tr>
                                <th class="text-[#c9c9c9] pt-7">Sub total</th>
                                <td class="w-fit text-right pt-7">$607.60</td>
                            </tr>
                            <tr>
                                <th class="text-[#c9c9c9] pt-7">Shipping</th>
                                <td class="w-fit text-right pt-7">$00.00</td>
                            </tr>
                        </table>
                    </div>
                    <div class="w-[90%] pl-14 pt-10 pb-10">
                        <hr>
                    </div>
                    <div class="pl-6 pb-10">
                        <table class="text-left">
                            <tr>
                                <th class="text-[#c9c9c9]  w-[85%]">Total</th>
                                <td class="w-fit text-right">$607.60</td>
                            </tr>
                        </table>
                    </div>
                    <form action="http://127.0.0.1:8000/checkout/confirmation">
                        <div class="flex justify-center">
                            <button type="submit" class="w-[80%] text-white bg-black h-16 text-[17px]">Continue to Payment</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

</x-app-layout>