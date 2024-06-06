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
                <div class="text-[#636363]">Home / ShoppingCart</div>
            </div>
        </div>
        <div class="w-full overflow-x-auto p-16">
            @if(Cart::count() > 0)
            <button id="deleteSelected" class="bg-red-500 hover:bg-red-700 text-white text-sm font-bold py-2 px-4 rounded hidden">
                Delete Selected Items
            </button>
            <div class="flex gap-x-20">
                <div class="flex w-3/4 flex-col">
                    <table class="cart-table table table-bordered shadow-md sm:rounded-lg mx-auto my-5 border-collapse border border-gray-400 w-full">
                        <thead class="bg-[#0A0A0A] text-[#FFFFFF] text-center h-[65px]">
                            <tr>
                                <th class="w-[8%]"><input type="checkbox" class="border-white border-2 focus:border-white focus:ring-0 focus:outline-none bg-gray-50 rounded-[4px] cursor-pointer outline text-[#9b8e8e]" id="checkAll"></th>
                                <th scope="col" class="w-[35%]">Product</th>
                                <th scope="col" class="w-[15%]">Price</th>
                                <th scope="col" class="w-[20%]">Quantity</th>
                                <th scope="col" class="w-[15%]">Subtotal</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="col-auto text-center my-10 mx-10">
                            @foreach ($cartDetails as $detail)
                                <tr class="hover:bg-gray-100 cursor-pointer" data-row-id="{{ $detail['item']->rowId }}">
                                    <td><input type="checkbox" class="row-checkbox focus:ring-0 focus:outline-none bg-gray-50 rounded-[4px] cursor-pointer text-black" {{ $detail['item']->options->selected ? 'checked' : '' }}></td>
                                    <td class="py-5" align="center">
                                        <div class="flex">
                                            <img src="{{ $detail['product']->images->first()->image_path ?? asset('storage/product_image.png') }}" alt="{{ $detail['product']->name }}" class="ml-4 px-1 py-1 max-w-[150px] object-cover rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 ease-in-out w-60 h-40">
                                            <div class="m-auto align-middle">
                                                <div class="font-bold text-lg">{{ $detail['item']->name }}</div>
                                                <div class="text-sm {{ !$detail['color'] ? 'hidden' : '' }}" data-color-id="{{$detail['item']->options->colorId}}">
                                                    Color: {{ $detail['color']->color_name ?? 'N/A' }}
                                                </div>
                                                <div class="text-sm {{ !$detail['size'] ? 'hidden' : '' }}" data-size-id="{{$detail['item']->options->sizeId}}">
                                                    Size: {{ $detail['size']->size_description ?? 'N/A' }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td align="center" class="product-price text-lg font-bold">${{ $detail['item']->price() }}</td>
                                    <td align="center">
                                        <div class="relative flex items-center justify-center w-[7rem]">
                                            <button type="button" class="decrement-button hover:bg-gray-200 border border-gray-300 rounded-s-lg p-2 h-11 focus:ring-gray-100 focus:ring-2 focus:outline-none bg-white">
                                                <svg class="w-4 h-4 text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16" />
                                                </svg>
                                            </button>
                                            <input type="text" class="quantity-input border-x-0 border-gray-300 h-11 text-center text-lg block w-full py-2.5" value="{{ $detail['item']->qty }}" required disabled />
                                            <button type="button" class="increment-button hover:bg-gray-200 border border-gray-300 rounded-e-lg p-2 h-11 focus:ring-gray-100 focus:ring-2 focus:outline-none bg-white">
                                                <svg class="w-4 h-4 text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16" />
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                    <td align="center" class="sub-total text-lg font-bold">${{ $detail['item']->subtotal() }}</td>
                                    <td align="center">
                                        <button class="remove-button text-white bg-red-800 hover:bg-red-900 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-2 py-1.5 me-2 text-center inline-flex items-center dark:bg-red-600 dark:hover:bg-red-700 transform hover:scale-110 transition duration-300 ease-in-out" data-row-id="{{ $detail['item']->rowId }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="flex flex-col h-fit w-[30%] border-2 gap-y-5 px-5 py-10 mt-5 mb-5 border-[#818181]">
                    <div class="flex flex-col gap-y-2">
                        <div class="font-bold text-xl">Order Summary</div>
                        <hr class="mt-2 mb-2">

                        @php
                            $selectedItems = Cart::instance('db')->content()->filter(function ($item) {
                                return $item->options->has('selected') && $item->options->selected === true;
                            });
                            $subtotal = $selectedItems->reduce(function ($carry, $item) {
                                return $carry + ($item->price * $item->qty);
                            }, 0);
                            $tax = $subtotal * 0.1;
                            $shipping = 30.00;
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
                    <button id="checkout-btn" class="bg-[#0A0A0A] px-10 py-5 text-center text-white">
                        Proceed to Checkout
                    </button>
                </div>
            </div>
            @else
            <div class="flex flex-col items-center justify-center h-[400px]">
                <h2 class="font-bold text-2xl">You have no items in cart 🎈</h2>
                <a href="{{ route('customer.products.index') }}" class="mt-10 bg-[#0A0A0A] px-5 py-3 rounded text-center text-white">
                    Continue Shopping
                </a>
            </div>
            @endif
        </div>
</x-app-layout>
