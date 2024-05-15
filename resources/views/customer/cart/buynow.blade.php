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
                <div class="font-bold text-[28px]">Shopping Cart</div>
                <div class="text-[#636363]"><a href="{{ route('customer.home') }}">Home</a> / ShoppingCart</div>
            </div>
        </div>
        <div class="w=full overflow-x-auto pl-10 pt-10">
            <div class="flex gap-x-28">
                <table class="table table-fixed w-[60%]">
                    <thead class="bg-[#0A0A0A] text-[#FFFFFF] text-center h-[65px]">
                        <tr>
                            <th scope="col" class=" w-[35%]">Product</th>
                            <th scope="col" class=" w-[20%]">Price</th>
                            <th scope="col" class=" w-[20%]">Quantity</th>
                            <th scope="col" class=" w-[20%]">Subtotal</th>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody class="col-auto text-center ">
                        <tr>
                            <td>
                                <div class="flex">
                                    <img src="{{asset ($product->images->first()->image_path) }}" alt=""
                                        class="px-4 py-2 max-w-[150px] object-cover overflows-hidden">
                                    <div class="flex justify-center items-center ">
                                        <div class="flex-col  my-7">
                                            <div class="font-bold text-lg">{{$product -> name}}</div>
                                            <div class="text-sm">Color:{{ $selectedColor }} </div>
                                            <div class="text-sm">Size: {{$selectedSize}}</div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="text-lg font-bold"><span class="productprice">{{$product->price}}</span></td>
                            <td align="center">
                                <div class="relative flex items-center justify-center w-[6.9rem]">
                                    <button onclick="" type="button" id="decrement-button_buynow"
                                        class=" hover:bg-gray-200 border border-gray-300 rounded-s-lg p-2 h-11 focus:ring-gray-100 focus:ring-2 focus:outline-none">
                                        <svg class="w-4 h-4 text-gray-900" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="M1 1h16" />
                                        </svg>
                                    </button>
                                    <input type="text" id="quantity-input_buynow"
                                        class="border-x-0 border-gray-300 h-11 text-center text-lg block w-full py-2.5 "
                                        value="{{$quantity}}" required disabled />
                                    <button type="button" id="increment-button_buynow"
                                        class="hover:bg-gray-200 border border-gray-300 rounded-e-lg p-2 h-11 focus:ring-gray-100 focus:ring-2 focus:outline-none">
                                        <svg class="w-4 h-4 text-gray-900" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="M9 1v16M1 9h16" />
                                        </svg>
                                    </button>
                                </div>
                            </td>

                            <td id="price_total" class="text-lg font-bold"></td>
                            <td>
                                <button class="delete"> <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                    </svg>

                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <div class="flex flex-col h-fit w-[30%] border-2 gap-y-5 px-5 py-10 mt-5 mb-5 border-[#818181]">
                    <div class="flex flex-col gap-y-2">
                        <div class="font-bold">Order Summary</div>
                        <hr class="mt-2 mb-2">
                        <div class="flex justify-between">
                            <div>Item</div>
                            <div class="total_items"></div>
                        </div>
                        <div class="flex justify-between">
                            <div>Sub total</div>
                            <div class="total_price_item"></div>
                        </div>
                        <div class="flex justify-between">
                            <div>Shipping</div>
                            <div>$2</div>
                        </div>
                        <div class="flex justify-between">
                            <div>Taxes</div>
                            <div>$2</div>
                        </div>
                        <hr class="mt-2 mb-2">
                        <div class="flex justify-between font-bold">
                            <div>Total</div>
                            <div class="total_price"></div>
                        </div>
                    </div>
                    <button class="bg-[#0A0A0A] px-10 py-5 text-center text-white">
                        Proceed to Checkout
                    </button>
                </div>
            </div>
        </div>
</x-app-layout>