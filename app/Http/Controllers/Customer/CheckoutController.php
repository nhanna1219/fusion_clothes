<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data)
            )
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        //execute post
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);
        return $result;
    }

    public function momopayment()
    {

        // include "../common/helper.php";

        $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";


        $partnerCode = 'MOMOBKUN20180529';
        $accessKey = 'klm05TvNBzhg7h7j';
        $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
        $orderInfo = 'Thanh toán qua MoMo';
        $amount = "10000";
        $orderId = time() . "";
        $returnUrl = "http://localhost:8000/atm/result_atm.php";
        $notifyurl = "http://localhost:8000/atm/ipn_momo.php";
        // Lưu ý: link notifyUrl không phải là dạng localhost
        $bankCode = "SML";

        $requestId = time() . "";
        $requestType = "payWithMoMoATM";
        $extraData = "";
        //before sign HMAC SHA256 signature
        $rawHashArr =  array(
            'partnerCode' => $partnerCode,
            'accessKey' => $accessKey,
            'requestId' => $requestId,
            'amount' => $amount,
            'orderId' => $orderId,
            'orderInfo' => $orderInfo,
            'bankCode' => $bankCode,
            'returnUrl' => $returnUrl,
            'notifyUrl' => $notifyurl,
            'extraData' => $extraData,
            'requestType' => $requestType
        );
        // echo $serectkey;die;
        $rawHash = "partnerCode=" . $partnerCode . "&accessKey=" . $accessKey . "&requestId=" . $requestId . "&bankCode=" . $bankCode . "&amount=" . $amount . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&returnUrl=" . $returnUrl . "&notifyUrl=" . $notifyurl . "&extraData=" . $extraData . "&requestType=" . $requestType;
        $signature = hash_hmac("sha256", $rawHash, $secretKey);

        $data =  array(
            'partnerCode' => $partnerCode,
            'accessKey' => $accessKey,
            'requestId' => $requestId,
            'amount' => $amount,
            'orderId' => $orderId,
            'orderInfo' => $orderInfo,
            'returnUrl' => $returnUrl,
            'bankCode' => $bankCode,
            'notifyUrl' => $notifyurl,
            'extraData' => $extraData,
            'requestType' => $requestType,
            'signature' => $signature
        );
        $result = $this->execPostRequest($endpoint, json_encode($data));
        $jsonResult = json_decode($result, true);  // decode json

        if ($jsonResult === null && json_last_error() !== JSON_ERROR_NONE) {
            error_log('Invalid JSON: ' . json_last_error_msg());
        } else {
            error_log(print_r($jsonResult, true));
            if (isset($jsonResult['payUrl'])) {
                header('Location: ' . $jsonResult['payUrl']);
            } else {
                error_log('payUrl does not exist in the response');
            }
        }
    }


    public function friendlyThanks()
    {
        return view('customer.checkout.friendlyThanks');
    }


    public function index()
    {
        // if (!Auth::check()) {
        //     // User is not logged in, redirect to login page
        //     return redirect()->route('login')->with('error', 'Please login to proceed to checkout.');
        // }
        return view('customer.checkout.index');
    }
    public function confirmation()
    {

        return view('customer.checkout.confirmation');
    }
}
