<!-- resources/views/components/order-details.blade.php -->

<div>
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Product Name</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Size</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Color</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Quantity</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($order->orderDetail as $detail)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $detail->productVariant->product->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $detail->productVariant->size->size_description }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $detail->productVariant->color->color_name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $detail->productVariant->product->price }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $detail->quantity }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
