<x-app-layout>
    <x-slot name="header"></x-slot>
    <div>
        <div
            class="bg-[#f5f5f5] w-full h-[150px] flex flex-col justify-center items-center relative z-10 overflow-hidden completed">
            <img src="{{ asset('storage/background_pattern.png') }}" alt=""
                class="absolute w-[20%] min-w-[150px] max-w-[200px] bottom-[-10%] left-[10%] z-0">
            <img src="{{ asset('storage/background_pattern.png') }}" alt=""
                class="absolute w-[20%] min-w-[150px] max-w-[200px] top-[-10%] right-[10%] z-0">
            <div class="flex flex-col gap-y-3 justify-center items-center">
                <div class="font-bold text-[28px]">Order Completed</div>
                <div class="text-[#636363]">Home / Order</div>
            </div>
        </div>
        <div class="tick">
            <img src="{{ asset('storage/checkmark-circle-outline.svg') }}" alt="" class="icons">
            <p class="sentence1">Your order is completed!</p>
            <p class="sentence2">Your order has been received, we'll be delivering it to you soon 🎉</p>
        </div>
        <div class="in4order rounded">
            <div class="items">
                <p>Order ID</p>
                <p>#{{ $order->id }}</p>
            </div>
            <div class="items">
                <p>Payment method</p>
                <p>{{ $paymentDetail->payment_method }}</p>
            </div>
            <div class="items">
                <p>Transaction ID</p>
                <p>{{ $paymentDetail->transaction_id ?? 'N/A' }}</p>
            </div>
            <div class="items">
                <p>Estimated Delivery Date</p>
                <p>{{ \Carbon\Carbon::now()->addDays(7)->format('d/m/Y') }}</p>
            </div>
            <div class="download rounded"><button>Download Invoice</button></div>
        </div>

        <!-- Table product -->
        <div class="tableproduct p-4 bg-white shadow rounded-lg">
            <div class="detail text-xl font-semibold mb-4">Order details</div>
            <div class="producttitle flex justify-between border-b pb-2 mb-4">
                <p class="font-medium text-gray-700">Products</p>
                <p class="font-medium text-gray-700">Sub total</p>
            </div>
            @foreach ($order->orderDetail as $detail)
                <div class="product flex justify-between items-center border-b py-4">
                    <div class="inforproduct flex items-center space-x-4">
                        <img src="{{ asset($detail->productVariant->product->images->first()->image_path) ?? ('storage/product_image.png') }}" class="ml-4 px-1 py-1 max-w-[150px] object-cover rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 ease-in-out w-60 h-40">
                        <div class="contentpro">
                            <p class="font-medium text-gray-900">{{ $detail->productVariant->product->name }}</p>
                            <div class="colorsize text-sm text-gray-600">
                                @if ($detail->productVariant->color)
                                    <p>Color: {{ $detail->productVariant->color->color_name }}</p>
                                @endif
                                @if ($detail->productVariant->size)
                                    <p>Size: {{ $detail->productVariant->size->size_description }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <p class="font-medium text-gray-900">
                        {{ number_format($detail->productVariant->product->price * $detail->quantity, 2) }}$</p>
                </div>
            @endforeach
        </div>

        <div class="fee mt-6 p-4 bg-white shadow rounded-lg space-y-4">
            <div class="shipping flex justify-between">
                <p class="font-medium text-gray-700">Shipping</p>
                <p class="font-medium text-gray-900">$30.00</p>
            </div>
            <div class="taxes flex justify-between">
                <p class="font-medium text-gray-700">Taxes</p>
                <p class="font-medium text-gray-900">10%</p>
            </div>
            <div class="coupon flex justify-between">
                <p class="font-medium text-gray-700">Coupon Discount</p>
                <p class="font-medium text-gray-900">$00.00</p>
            </div>
            <div class="total flex justify-between text-xl font-semibold">
                <p>Total</p>
                <p>${{ $order->total }}</p>
            </div>
        </div>

    </div>



</x-app-layout>
