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
        <div class="flex justify-between mr-24 px-24">
            <div class="flex flex-col gap-y-10">
                <div>
                    <div class="text-[20px] font-medium">Delivery Address *</div>
                    <div class="flex justify-between">
                        <div class="flex items-center  h-12 border-solid border-2 rounded">
                            <label class="cursor-pointer pl-3 w-80">
                                <input type="radio" id="same" name="address">
                                <label for="same" class="text-[18px] pl-3 cursor-pointer">Same as shipping
                                    address</label>
                            </label>
                        </div>
                        <div class="pl-14 ">
                            <div class="flex items-center h-12 border-solid border-2 rounded">
                                <label class="cursor-pointer w-80 pl-3">
                                    <input type="radio" id="diff" name="address">
                                    <label for="diff" class="text-[18px] cursor-pointer pl-3">Using a different billing
                                        address</label>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex justify-between">
                    <div class="">
                        <div class="text-[20px] font-medium">First Name *</div>
                        <input required class="border-solid rounded w-80" placeholder="Đạt">
                    </div>
                    <div class="">
                        <div class="text-[20px] font-medium">Last Name *</div>
                        <input required class="border-solid rounded w-80" placeholder="Hoàng">
                    </div>
                </div>
                <div class="">
                    <div class="text-[20px] font-medium ">City *</div>
                    <select id="city-province" class="w-[100%] border border-gray-300 rounded px-3 py-2.5 text-gray-700 ">
                        <option value='0'>&nbsp;Select City</option>
                        <option value='01'>&nbspThành phố Hà Nội</option>
                        <option value='79'>&nbspThành phố Hồ Chí Minh</option>
                        <option value='31'>&nbspThành phố Hải Phòng</option>
                        <option value='48'>&nbspThành phố Đà Nẵng</option>
                        <option value='92'>&nbspThành phố Cần Thơ</option>
                        <option value='02'>&nbspTỉnh Hà Giang</option>
                        <option value='04'>&nbspTỉnh Cao Bằng</option>
                        <option value='06'>&nbspTỉnh Bắc Kạn</option>
                        <option value='08'>&nbspTỉnh Tuyên Quang</option>
                        <option value='10'>&nbspTỉnh Lào Cai</option>
                        <option value='11'>&nbspTỉnh Điện Biên</option>
                        <option value='12'>&nbspTỉnh Lai Châu</option>
                        <option value='14'>&nbspTỉnh Sơn La</option>
                        <option value='15'>&nbspTỉnh Yên Bái</option>
                        <option value='17'>&nbspTỉnh Hoà Bình</option>
                        <option value='19'>&nbspTỉnh Thái Nguyên</option>
                        <option value='20'>&nbspTỉnh Lạng Sơn</option>
                        <option value='22'>&nbspTỉnh Quảng Ninh</option>
                        <option value='24'>&nbspTỉnh Bắc Giang</option>
                        <option value='25'>&nbspTỉnh Phú Thọ</option>
                        <option value='26'>&nbspTỉnh Vĩnh Phúc</option>
                        <option value='27'>&nbspTỉnh Bắc Ninh</option>
                        <option value='30'>&nbspTỉnh Hải Dương</option>
                        <option value='33'>&nbspTỉnh Hưng Yên</option>
                        <option value='34'>&nbspTỉnh Thái Bình</option>
                        <option value='35'>&nbspTỉnh Hà Nam</option>
                        <option value='36'>&nbspTỉnh Nam Định</option>
                        <option value='37'>&nbspTỉnh Ninh Bình</option>
                        <option value='38'>&nbspTỉnh Thanh Hóa</option>
                        <option value='40'>&nbspTỉnh Nghệ An</option>
                        <option value='42'>&nbspTỉnh Hà Tĩnh</option>
                        <option value='44'>&nbspTỉnh Quảng Bình</option>
                        <option value='45'>&nbspTỉnh Quảng Trị</option>
                        <option value='46'>&nbspTỉnh Thừa Thiên Huế</option>
                        <option value='49'>&nbspTỉnh Quảng Nam</option>
                        <option value='51'>&nbspTỉnh Quảng Ngãi</option>
                        <option value='52'>&nbspTỉnh Bình Định</option>
                        <option value='54'>&nbspTỉnh Phú Yên</option>
                        <option value='56'>&nbspTỉnh Khánh Hòa</option>
                        <option value='58'>&nbspTỉnh Ninh Thuận</option>
                        <option value='60'>&nbspTỉnh Bình Thuận</option>
                        <option value='62'>&nbspTỉnh Kon Tum</option>
                        <option value='64'>&nbspTỉnh Gia Lai</option>
                        <option value='66'>&nbspTỉnh Đắk Lắk</option>
                        <option value='67'>&nbspTỉnh Đắk Nông</option>
                        <option value='68'>&nbspTỉnh Lâm Đồng</option>
                        <option value='70'>&nbspTỉnh Bình Phước</option>
                        <option value='72'>&nbspTỉnh Tây Ninh</option>
                        <option value='74'>&nbspTỉnh Bình Dương</option>
                        <option value='75'>&nbspTỉnh Đồng Nai</option>
                        <option value='77'>&nbspTỉnh Bà Rịa - Vũng Tàu</option>
                        <option value='80'>&nbspTỉnh Long An</option>
                        <option value='82'>&nbspTỉnh Tiền Giang</option>
                        <option value='83'>&nbspTỉnh Bến Tre</option>
                        <option value='84'>&nbspTỉnh Trà Vinh</option>
                        <option value='86'>&nbspTỉnh Vĩnh Long</option>
                        <option value='87'>&nbspTỉnh Đồng Tháp</option>
                        <option value='89'>&nbspTỉnh An Giang</option>
                        <option value='91'>&nbspTỉnh Kiên Giang</option>
                        <option value='93'>&nbspTỉnh Hậu Giang</option>
                        <option value='94'>&nbspTỉnh Sóc Trăng</option>
                        <option value='95'>&nbspTỉnh Bạc Liêu</option>
                        <option value='96'>&nbspTỉnh Cà Mau</option>
                    </select>
                </div>
                <div class="">
                    <div class="text-[20px] font-medium">District *</div>
                    <select id="district-town" class="w-[100%] border border-gray-300 rounded px-3 py-2.5 text-gray-700 ">
                        <option value='0'>&nbsp;Select District</option>
                    </select>
                </div>
                <div class="">
                    <div class="text-[20px] font-medium">Ward *</div>
                    <select id="ward-commune" class="w-[100%] border border-gray-300 rounded px-3 py-2.5 text-gray-700 ">
                        <option value='0'>&nbsp;Select Ward</option>
                    </select>
                </div>
                <div class="">
                    <div class="text-[20px] font-medium">Address *</div>
                    <input required class="border-solid rounded w-[100%]" placeholder="Enter address">
                </div>
                <div class="">
                    <div class="text-[20px] font-medium">Phone *</div>
                    <input required class="border-solid rounded w-[100%]" placeholder="098...">
                </div>
                <div class="">
                    <div class="text-[20px] font-medium">Email *</div>
                    <input required class="border-solid rounded w-[100%]" placeholder="Enter email">
                </div>
            </div>
            <div class="flex flex-col h-fit w-[30%] border-2 gap-y-5 px-5 py-5 border-[#818181]">
                <div class="flex flex-col gap-y-2">
                    <div class="font-bold">Order Summary</div>
                    <hr class="mt-2 mb-2">
                    <div class="flex justify-between">
                        <div>Item</div>
                        <div>8</div>
                    </div>
                    <div class="flex justify-between">
                        <div>Sub total</div>
                        <div>$120</div>
                    </div>
                    <div class="flex justify-between">
                        <div>Shipping</div>
                        <div>$2</div>
                    </div>
                    <div class="flex justify-between">
                        <div>Taxes</div>
                        <div>$12</div>
                    </div>
                    <hr class="mt-2 mb-2">
                    <div class="flex justify-between font-bold">
                        <div>Total</div>
                        <div>$550</div>
                    </div>
                </div>

                <form action="{{url('/checkout/confirmation')}}">
                    <div class="flex justify-center">
                        <button type="submit" class="w-[80%] text-white bg-black h-16 text-[17px] rounded-md">Continue
                            to Payment</button>
                    </div>
                </form>
            </div>

        </div>
    </div>

</x-app-layout>