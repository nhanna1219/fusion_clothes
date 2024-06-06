<x-app-layout>
    <x-slot name="header"></x-slot>
    <div>
        <div
            class="bg-[#f5f5f5] w-full h-[150px] flex flex-col justify-center items-center relative z-10 overflow-hidden">
            <img src="{{ asset('storage/background_pattern.png') }}" alt=""
                class="absolute w-[20%] min-w-[150px] max-w-[200px] bottom-[-10%] left-[10%] z-0">
            <img src="{{ asset('storage/background_pattern.png') }}" alt=""
                class="absolute w-[20%] min-w-[150px] max-w-[200px] top-[-10%] right-[10%] z-0">
            <div class="flex flex-col gap-y-3 justify-center items-center">
                <div class="font-bold text-[28px]">Checkout</div>
                <div class="text-[#636363]">Home / Shopping Cart / Checkout</div>
            </div>
        </div>

        <h2 class="font-bold text-[25px] pt-16 pl-24 pb-12">Billing Details</h2>

        <form id="checkout-form" action="/checkout/place-order" method="POST"
            class="flex justify-between mr-24 px-24 pb-8">
            @csrf
            <div class="flex flex-col gap-y-10 w-[60%]">
                <div>
                    <div class="text-[20px] font-medium">Delivery Address</div>
                    @forelse($addresses as $index => $address)
                        <div class="form-check my-3">
                            <input class="form-check-input" type="radio" name="address"
                                id="address{{ $index }}" value="{{ $address->id }}"
                                {{ $loop->first ? 'checked' : '' }}>
                            <label class="ms-3 form-check-label" for="address{{ $index }}">
                                {{ $address->address_line1 }}, {{ $address->city }}
                            </label>
                        </div>
                    @empty
                        <p class="my-6">You have no saved addresses.</p>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="address" id="newAddress" value="new"
                                checked>
                            <label class="ms-3 form-check-label" for="newAddress">
                                Enter a new address
                            </label>
                        </div>
                    @endforelse

                    <!-- Option to Enter a New Address -->
                    @if ($addresses->isNotEmpty())
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="address" id="newAddress"
                                value="new">
                            <label class="ms-3 form-check-label" for="newAddress">
                                Enter a new address
                            </label>
                        </div>
                    @endif

                </div>
                @if ($errors->any())
                    <div class="flex p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                        <svg class="flex-shrink-0 inline w-4 h-4 me-3 mt-[2px]" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                        </svg>
                        <span class="sr-only">Danger</span>
                        <div>
                            <span class="font-medium">Ensure that these requirements are met:</span>
                            <ul class="mt-1.5 list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif
                <div id="new-address-form" class="w-full">
                    <div class="flex justify-between">
                        <div class="w-1/2 pr-2">
                            <label for="first-name" class="block font-semibold mb-2">First Name *</label>
                            <input id="first-name" name="first_name" type="text" required
                                class="border-solid rounded w-full" placeholder="John" value="{{ old('first_name') }}">
                        </div>
                        <div class="w-1/2 pl-2">
                            <label for="last-name" class="block font-semibold mb-2">Last Name *</label>
                            <input id="last-name" name="last_name" type="text" required
                                class="border-solid rounded w-full" placeholder="Smith" value="{{ old('last_name') }}">
                        </div>
                    </div>
                    <div class="my-6">
                        <div class="font-semibold mb-2">City *</div>
                        <select id="city-province"
                            class="w-[100%] border border-gray-300 rounded px-3 py-2.5 text-gray-700" name="city">
                            <option value='0'>Select City</option>
                            <option value='01' {{ old('city') == 'Thành phố Hà Nội' }}>Thành phố Hà Nội</option>
                            <option value='79' {{ old('city') == 'Thành phố Hồ Chí Minh' }}>Thành phố Hồ Chí Minh
                            </option>
                            <option value='31' {{ old('city') == 'Thành phố Hải Phòng' }}>Thành phố Hải Phòng
                            </option>
                            <option value='48' {{ old('city') == 'Thành phố Đà Nẵng' }}>Thành phố Đà Nẵng</option>
                            <option value='92' {{ old('city') == 'Thành phố Cần Thơ' }}>Thành phố Cần Thơ</option>
                            <option value='02' {{ old('city') == 'Tỉnh Hà Giang' }}>Tỉnh Hà Giang</option>
                            <option value='04' {{ old('city') == 'Tỉnh Cao Bằng' }}>Tỉnh Cao Bằng</option>
                            <option value='06' {{ old('city') == 'Tỉnh Bắc Kạn' }}>Tỉnh Bắc Kạn</option>
                            <option value='08' {{ old('city') == 'Tỉnh Tuyên Quang' }}>Tỉnh Tuyên Quang</option>
                            <option value='10' {{ old('city') == 'Tỉnh Lào Cai' }}>Tỉnh Lào Cai</option>
                            <option value='11' {{ old('city') == 'Tỉnh Điện Biên' }}>Tỉnh Điện Biên</option>
                            <option value='12' {{ old('city') == 'Tỉnh Lai Châu' }}>Tỉnh Lai Châu</option>
                            <option value='14' {{ old('city') == 'Tỉnh Sơn La' }}>Tỉnh Sơn La</option>
                            <option value='15' {{ old('city') == 'Tỉnh Yên Bái' }}>Tỉnh Yên Bái</option>
                            <option value='17' {{ old('city') == 'Tỉnh Hoà Bình' }}>Tỉnh Hoà Bình</option>
                            <option value='19' {{ old('city') == 'Tỉnh Thái Nguyên' }}>Tỉnh Thái Nguyên</option>
                            <option value='20' {{ old('city') == 'Tỉnh Lạng Sơn' }}>Tỉnh Lạng Sơn</option>
                            <option value='22' {{ old('city') == 'Tỉnh Quảng Ninh' }}>Tỉnh Quảng Ninh</option>
                            <option value='24' {{ old('city') == 'Tỉnh Bắc Giang' }}>Tỉnh Bắc Giang</option>
                            <option value='25' {{ old('city') == 'Tỉnh Phú Thọ' }}>Tỉnh Phú Thọ</option>
                            <option value='26' {{ old('city') == 'Tỉnh Vĩnh Phúc' }}>Tỉnh Vĩnh Phúc</option>
                            <option value='27' {{ old('city') == 'Tỉnh Bắc Ninh' }}>Tỉnh Bắc Ninh</option>
                            <option value='30' {{ old('city') == 'Tỉnh Hải Dương' }}>Tỉnh Hải Dương</option>
                            <option value='33' {{ old('city') == 'Tỉnh Hưng Yên' }}>Tỉnh Hưng Yên</option>
                            <option value='34' {{ old('city') == 'Tỉnh Thái Bình' }}>Tỉnh Thái Bình</option>
                            <option value='35' {{ old('city') == 'Tỉnh Hà Nam' }}>Tỉnh Hà Nam</option>
                            <option value='36' {{ old('city') == 'Tỉnh Nam Định' }}>Tỉnh Nam Định</option>
                            <option value='37' {{ old('city') == 'Tỉnh Ninh Bình' }}>Tỉnh Ninh Bình</option>
                            <option value='38' {{ old('city') == 'Tỉnh Thanh Hóa' }}>Tỉnh Thanh Hóa</option>
                            <option value='40' {{ old('city') == 'Tỉnh Nghệ An' }}>Tỉnh Nghệ An</option>
                            <option value='42' {{ old('city') == 'Tỉnh Hà Tĩnh' }}>Tỉnh Hà Tĩnh</option>
                            <option value='44' {{ old('city') == 'Tỉnh Quảng Bình' }}>Tỉnh Quảng Bình</option>
                            <option value='45' {{ old('city') == 'Tỉnh Quảng Trị' }}>Tỉnh Quảng Trị</option>
                            <option value='46' {{ old('city') == 'Tỉnh Thừa Thiên Huế' }}>Tỉnh Thừa Thiên Huế
                            </option>
                            <option value='49' {{ old('city') == 'Tỉnh Quảng Nam' }}>Tỉnh Quảng Nam</option>
                            <option value='51' {{ old('city') == 'Tỉnh Quảng Ngãi' }}>Tỉnh Quảng Ngãi</option>
                            <option value='52' {{ old('city') == 'Tỉnh Bình Định' }}>Tỉnh Bình Định</option>
                            <option value='54' {{ old('city') == 'Tỉnh Phú Yên' }}>Tỉnh Phú Yên</option>
                            <option value='56' {{ old('city') == 'Tỉnh Khánh Hòa' }}>Tỉnh Khánh Hòa</option>
                            <option value='58' {{ old('city') == 'Tỉnh Ninh Thuận' }}>Tỉnh Ninh Thuận</option>
                            <option value='60' {{ old('city') == 'Tỉnh Bình Thuận' }}>Tỉnh Bình Thuận</option>
                            <option value='62' {{ old('city') == 'Tỉnh Kon Tum' }}>Tỉnh Kon Tum</option>
                            <option value='64' {{ old('city') == 'Tỉnh Gia Lai' }}>Tỉnh Gia Lai</option>
                            <option value='66' {{ old('city') == 'Tỉnh Đắk Lắk' }}>Tỉnh Đắk Lắk</option>
                            <option value='67' {{ old('city') == 'Tỉnh Đắk Nông' }}>Tỉnh Đắk Nông</option>
                            <option value='68' {{ old('city') == 'Tỉnh Lâm Đồng' }}>Tỉnh Lâm Đồng</option>
                            <option value='70' {{ old('city') == 'Tỉnh Bình Phước' }}>Tỉnh Bình Phước</option>
                            <option value='72' {{ old('city') == 'Tỉnh Tây Ninh' }}>Tỉnh Tây Ninh</option>
                            <option value='74' {{ old('city') == 'Tỉnh Bình Dương' }}>Tỉnh Bình Dương</option>
                            <option value='75' {{ old('city') == 'Tỉnh Đồng Nai' }}>Tỉnh Đồng Nai</option>
                            <option value='77' {{ old('city') == 'Tỉnh Bà Rịa - Vũng Tàu' }}>Tỉnh Bà Rịa - Vũng
                                Tàu</option>
                            <option value='80' {{ old('city') == 'Tỉnh Long An' }}>Tỉnh Long An</option>
                            <option value='82' {{ old('city') == 'Tỉnh Tiền Giang' }}>Tỉnh Tiền Giang</option>
                            <option value='83' {{ old('city') == 'Tỉnh Bến Tre' }}>Tỉnh Bến Tre</option>
                            <option value='84' {{ old('city') == 'Tỉnh Trà Vinh' }}>Tỉnh Trà Vinh</option>
                            <option value='86' {{ old('city') == 'Tỉnh Vĩnh Long' }}>Tỉnh Vĩnh Long</option>
                            <option value='87' {{ old('city') == 'Tỉnh Đồng Tháp' }}>Tỉnh Đồng Tháp</option>
                            <option value='89' {{ old('city') == 'Tỉnh An Giang' }}>Tỉnh An Giang</option>
                            <option value='91' {{ old('city') == 'Tỉnh Kiên Giang' }}>Tỉnh Kiên Giang</option>
                            <option value='93' {{ old('city') == 'Tỉnh Hậu Giang' }}>Tỉnh Hậu Giang</option>
                            <option value='94' {{ old('city') == 'Tỉnh Sóc Trăng' }}>Tỉnh Sóc Trăng</option>
                            <option value='95' {{ old('city') == 'Tỉnh Bạc Liêu' }}>Tỉnh Bạc Liêu</option>
                            <option value='96' {{ old('city') == 'Tỉnh Cà Mau' }}>Tỉnh Cà Mau</option>
                        </select>
                    </div>
                    <div class="my-6">
                        <label for="district-town" class="block font-semibold mb-2">District *</label>
                        <select id="district-town"
                            class="w-full border border-gray-300 rounded px-3 py-2.5 text-gray-700" name="district">
                            <option value='0'>Select District</option>
                        </select>
                    </div>
                    <div class="my-6">
                        <label for="ward-commune" class="block font-semibold mb-2">Ward *</label>
                        <select id="ward-commune"
                            class="w-full border border-gray-300 rounded px-3 py-2.5 text-gray-700" name="ward">
                            <option value='0'>Select Ward</option>
                        </select>
                    </div>
                    <div class="my-6">
                        <label for="address-line1" class="block font-semibold mb-2">Address Line 1 *</label>
                        <input id="address-line1" name="address_line1" type="text" required
                            class="border-solid rounded w-full" placeholder="Enter address"
                            value="{{ old('address_line1') }}">
                    </div>
                    <div class="my-6">
                        <label for="address-line2" class="block font-semibold mb-2">Address Line 2</label>
                        <input id="address-line2" name="address_line2" type="text"
                            class="border-solid rounded w-full" placeholder="Enter address"
                            value="{{ old('address_line2') }}">
                    </div>
                    <div class="my-6">
                        <label for="phone" class="block font-semibold mb-2">Phone *</label>
                        <input type="tel" id="phone" name="phone" pattern="\d{10,11}"
                            title="Phone number must be 10 or 11 digits long without any dashes or spaces."
                            class="border-solid rounded w-full" required value="{{ old('phone') }}">
                    </div>
                </div>
            </div>
            <div class="flex flex-col h-fit w-[30%] border-2 gap-y-5 px-5 py-5 border-[#818181]">
                <div class="flex flex-col gap-y-2">
                    <div class="font-bold text-xl">Order Summary</div>
                    <hr class="mt-2 mb-2">

                    @php
                        $selectedItems = Cart::instance('db')
                            ->content()
                            ->filter(function ($item) {
                                return $item->options->has('selected') && $item->options->selected === true;
                            });
                        $subtotal = $selectedItems->reduce(function ($carry, $item) {
                            return $carry + ($item->price * $item->qty);
                        }, 0);
                        $tax = $subtotal * 0.1;
                        $shipping = 30.0;
                        $total = $subtotal + $tax + $shipping;
                    @endphp
                    <div class="flex justify-between">
                        <div>Items</div>
                        <div class="total_items">
                            {{ $selectedItems->sum('qty') }}
                        </div>
                    </div>
                    <div class="flex justify-between">
                        <div>Sub total</div>
                        <div class="total-sub-total">${{ number_format($subtotal, 2) }}</div>
                    </div>
                    <div class="flex justify-between">
                        <div>Shipping</div>
                        <div>${{ number_format($shipping, 2) }}</div>
                    </div>
                    <div class="flex justify-between">
                        <div>Taxes</div>
                        <div>10%</div>
                    </div>
                    <hr class="mt-2 mb-2">
                    <div class="flex justify-between font-bold">
                        <div>Total</div>
                        <div class="total_price">${{ number_format($total, 2) }}</div>
                    </div>
                </div>

                <div class="flex flex-col items-center space-y-4 mt-3">
                    <input type="hidden" name="payment_method" id="payment_method">
                    <!-- Button for Cash on Delivery -->
                    <button class="payment-method-btn" type="submit" value="COD"
                        style="background-color: #000000; color: white; border: none; padding: 10px 20px; border-radius: 5px; display: flex; align-items: center; justify-content: center;width: 245px">
                        <img src="{{ asset('storage/cod_logo.jpg') }}" alt="MoMo"
                            style="height: 18px; margin-right: 10px;">
                        Cash on Delivery
                    </button>
                    <!-- Button for MoMo Payment -->
                    <button class="payment-method-btn" type="submit" value="Momo"
                        style="background-color: #A50064; color: white; border: none; padding: 10px 20px; border-radius: 5px; display: flex; align-items: center; justify-content: center;width: 245px">
                        <img src="{{ asset('storage/momo_logo.png') }}" alt="MoMo"
                            style="height: 30px; margin-right: 10px;">
                        Checkout with MoMo
                    </button>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
