<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\CheckoutStoreRequest;
use App\Models\UserAddress;
use App\Models\PaymentDetail;
use App\Models\OrderDetail;
use App\Models\Order;
use App\Models\ProductVariant;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Controllers\Customer\OrderController;

class CheckoutController extends Controller
{
    public function index(Request $request): View
    {
        $user = Auth::user();
        $addresses = $user->addresses;
        return view('customer.checkout.index', compact('user', 'addresses'));
    }

    public function createOrder($paymentMethod)
    {
        $cartItems = Cart::instance('db')->content();

        $filteredItems = $cartItems->filter(function ($item) {
            return $item->options->selected === true;
        });
        $subtotal = $filteredItems->reduce(function ($carry, $item) {
            return $carry + ($item->price * $item->qty);
        }, 0);
        $tax = $subtotal * 0.1;
        $shipping = 30.00;
        $total = $subtotal + $tax + $shipping;

        $order = new Order();
        $order->user_id = auth()->id();
        $order->status = 'Pending';
        $order->total = $total;
        $order->save();

        // Save order items
        foreach ($filteredItems as $item) {
            $productVariant = ProductVariant::where('product_id', $item->id)
                ->where('size_id', $item->options->sizeId)
                ->where('color_id', $item->options->colorId)
                ->first();

            $orderDetail = new OrderDetail();
            $orderDetail->order_id = $order->id;
            $orderDetail->product_variant_id = $productVariant ? $productVariant->id : null;
            $orderDetail->quantity = $item->qty;
            $orderDetail->save();
        }

        // foreach ($filteredItems as $item) {
        //     Cart::instance('db')->remove($item->rowId);
        // }
        // Cart::instance('db')->erase(auth()->id());
        // Cart::instance('db')->store(auth()->id());

        if ($paymentMethod === 'Momo') {
            return $this->processMomoPayment($order, $total);
        } else {
            $paymentDetail = new PaymentDetail();
            $paymentDetail->order_id = $order->id;
            $paymentDetail->amount = $total;
            $paymentDetail->payment_method = $paymentMethod;
            $paymentDetail->status = 'Paid';
            $paymentDetail->save();

            return response()->json([
                'success' => true,
                'redirect_url' => route('customer.checkout.friendlyThanks'), 'order_id' => $order->id]);
        }
    }

    public function placeOrder(Request $request)
    {
        // $request->validate([
        //     'address' => 'required',
        //     'address_line1' => 'required_if:address,new',
        //     'city' => 'required_if:address,new',
        //     'district' => 'required_if:address,new',
        //     'ward' => 'required_if:address,new',
        //     'first_name' => 'required_if:address,new',
        //     'last_name' => 'required_if:address,new',
        //     'phone' => 'required_if:address,new',
        // ]);

        try {
            $paymentMethod = $request->input('payment_method');
            if (!in_array($paymentMethod, ['COD', 'Momo'])) {
                return response()->json(['error' => 'Invalid payment method.'], 400);
            }

            if ($request->address === 'new') {
                // Create new address
                $address = new UserAddress([
                    'user_id' => auth()->id(),
                    'address_line1' => $request->address_line1,
                    'address_line2' => $request->address_line2 ?? '', // Optional field
                    'city' => $request->city,
                    'district' => $request->district,
                    'ward' => $request->ward,
                    'phone' => $request->phone,
                ]);
                $address->save();
            } else {
                // Use existing address
                $address = UserAddress::findOrFail($request->address);
            }
            $jsonResult = $this->createOrder($paymentMethod);
            $jsonResult = $jsonResult->getData(true);

            if ($jsonResult['success']) {
                Log::info(Cart::instance('db')->content());
                if ($paymentMethod === 'Momo') {
                    return response()->json(['success' => true, 'redirect_url' => $jsonResult['redirect_url']]);
                } else {
                    return response()->json(['success' => true, 'redirect_url' => route('customer.checkout.friendlyThanks'), 'order_id' => $jsonResult['order_id']]);
                }
            } else {
                return response()->json(['error' => 'Order creation failed. Please try again.'], 500);
            }

        } catch (\Exception $e) {
            Log::error('Order placement failed: ' . $e->getMessage());
            return back()->withErrors('An error occurred while placing the order. Please try again.')
                ->withInput();
        }
    }

    public function confirmation(Request $request): View
    {
        $userAddresses = UserAddress::where('user_id', Auth::id())->get();
        $user = Auth::user();
        return view('customer.checkout.confirmation', compact('userAddresses', 'user'));
    }
    public function store(CheckoutStoreRequest $request): RedirectResponse
    {
        $userAddress = UserAddress::create($request->validated() + ['user_id' => Auth::id()]);
        return redirect()->route('customer.checkout.friendlyThanks');
    }
    public function friendlyThanks(Request $request): View
    {
        $orderId = $request->query('order_id');
        $order = Order::with([
            'orderDetail.productVariant.product',
            'orderDetail.productVariant.color',
            'orderDetail.productVariant.size'
        ])->findOrFail($orderId);

        $paymentDetail = PaymentDetail::where('order_id', $order->id)->first();

        return view('customer.checkout.friendlyThanks', compact('order', 'paymentDetail'));
    }

    public function processMomoPayment($order, $totalUSD)
    {
        $exchangeRate = 25427;
        $totalVND = round($totalUSD * $exchangeRate);
        $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";

        $partnerCode = 'MOMOBKUN20180529';
        $accessKey = 'klm05TvNBzhg7h7j';
        $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
        $orderInfo = "Thanh toán qua MoMo";
        $redirectUrl = route('customer.checkout.friendlyThanks');
        $ipnUrl = route('customer.checkout.friendlyThanks');
        $extraData = "";

        try {
            $orderId = time() . "";

            $requestId = time() . "";
            $requestType = "payWithATM";
            $rawHash = "accessKey=" . $accessKey . "&amount=" . $totalVND . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
            $signature = hash_hmac("sha256", $rawHash, $secretKey);
            $data = array(
                'partnerCode' => $partnerCode,
                'partnerName' => "Test",
                "storeId" => "MomoTestStore",
                'requestId' => $requestId,
                'amount' => $totalVND,
                'orderId' => $orderId,
                'orderInfo' => $orderInfo,
                'redirectUrl' => $redirectUrl,
                'ipnUrl' => $ipnUrl,
                'lang' => 'vi',
                'extraData' => $extraData,
                'requestType' => $requestType,
                'signature' => $signature
            );

            $certPath = base_path('public/storage/certs/cacert.pem');
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
            ])->withOptions([
                        'verify' => $certPath,
                    ])->post($endpoint, $data);

            if ($response->successful()) {
                $jsonResult = $response->json();
                Log::info("Response data: ", $jsonResult);

                $paymentDetail = new PaymentDetail();
                $paymentDetail->order_id = $order->id;
                $paymentDetail->amount = $totalUSD;
                $paymentDetail->payment_method = "Momo";
                if (isset($jsonResult['payUrl'])) {
                    // Redirect to the payment URL
                    $paymentDetail->status = 'Paid';
                    $paymentDetail->save();
                    return response()->json(['success' => true, 'redirect_url' => $jsonResult['payUrl']]);
                } else {
                    // Handle the error appropriately
                    $paymentDetail->status = 'Error';
                    $paymentDetail->save();
                    return response()->json(['error' => 'Payment URL not found in response.'], 500);
                }
            } else {
                Log::error('API request failed', [
                    'status' => $response->status(),
                    'response' => $response->body()
                ]);
                return response()->json(['error' => 'Payment request failed.'], $response->status());
            }
        } catch (\Exception $e) {
            Log::error('Order creation or payment initiation failed: ' . $e->getMessage());
            return response()->json(['error' => 'An error occurred while processing the payment. Please try again.'], 500);
        }
    }
}
