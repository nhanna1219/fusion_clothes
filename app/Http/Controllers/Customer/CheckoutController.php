<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\CheckoutStoreRequest;
use App\Models\UserAddress;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Http;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Support\Facades\Log;

class CheckoutController extends Controller
{
    public function index(Request $request): View
    {

        return view('customer.checkout.index');
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
        return view('customer.checkout.friendlyThanks');
    }

    public function momoPayment(Request $request)
    {
        $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";


        $partnerCode = 'MOMOBKUN20180529';
        $accessKey = 'klm05TvNBzhg7h7j';
        $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
        $orderInfo = "Thanh toán qua MoMo";
        $amount = "10000";
        $orderId = time() . "";
        $redirectUrl = "http://127.0.0.1:8000/checkout/thank-you";
        $ipnUrl = "http://127.0.0.1:8000/checkout/thank-you";
        $extraData = "";


        // if (!empty($_POST)) {
            // $partnerCode = $_POST["partnerCode"];
            // $accessKey = $_POST["accessKey"];
            // $secretKey = $_POST["secretKey"];
            // $orderId = $_POST["orderId"]; // Mã đơn hàng
            // $orderInfo = $_POST["orderInfo"];
            // $amount = $_POST["amount"];
            // $ipnUrl = $_POST["ipnUrl"];
            // $redirectUrl = $_POST["redirectUrl"];
            // $extraData = $_POST["extraData"];

            $requestId = time() . "";
            $requestType = "payWithATM";
            // $extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");
            //before sign HMAC SHA256 signature
            $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
            $signature = hash_hmac("sha256", $rawHash, $secretKey);
            $data = array(
                'partnerCode' => $partnerCode,
                'partnerName' => "Test",
                "storeId" => "MomoTestStore",
                'requestId' => $requestId,
                'amount' => $amount,
                'orderId' => $orderId,
                'orderInfo' => $orderInfo,
                'redirectUrl' => $redirectUrl,
                'ipnUrl' => $ipnUrl,
                'lang' => 'vi',
                'extraData' => $extraData,
                'requestType' => $requestType,
                'signature' => $signature
            );

            $certPath = base_path('public\storage\certs\cacert.pem');
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
            ])->withOptions([
                'verify' => $certPath,
            ])->post($endpoint, $data);

            if ($response->successful()) {
                $jsonResult = $response->json();
                // Log the response for debugging
                Log::info("Response data: ", $jsonResult);
                // Redirect to the payment URL
                if (isset($jsonResult['payUrl'])) {
                    return redirect()->to($jsonResult['payUrl']);
                } else {
                    // Handle the error appropriately
                    return response()->json(['error' => 'Payment URL not found in response.'], 500);
                }
            } else {
                // Log the error
                Log::error('API request failed', [
                    'status' => $response->status(),
                    'response' => $response->body()
                ]);
                // Handle the error
                return response()->json(['error' => 'Payment request failed.'], $response->status());
            }
        // }
    }
}
