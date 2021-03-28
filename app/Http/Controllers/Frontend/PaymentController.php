<?php

namespace App\Http\Controllers\Frontend;

use App\Cart;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    /**
     * Receive the payment from esewa
     * 
     * @param Request $request
     */
    public function pay(Request $request)
    {
        //In real time this url will be changed to esewa production url
        $url = "https://uat.esewa.com.np/epay/main";
        $successUrl = route('success-pay');
        $errorurl = route('error-pay');
        $cart =  Cart::where('is_checked_out', 0)
            ->where('user_id', Auth::id())
            ->get();
        $sum = $cart->sum('total');

        $data = [
            'amt' => $sum,
            'pdc' => 0,
            'psc' => 0,
            'txAmt' => 0,
            'tAmt' => 0,
            'pid' => $cart[0]->id . time(),
            'scd' => 'EPAYTEST',
            'su' => $successUrl,
            'fu' => $errorurl,
        ];

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        return $response;
        curl_close($curl);
    }

    /**
     *Success URL of payment 
     */
    public function successPay()
    {
        return redirect()->route('front-home')->with('success', 'Payment success.');
    }

    /**
     *Error URL of payment 
     */
    public function erroryPay()
    {
        return redirect()->route('all-carts')->with('error', 'Error on Payment');
    }
}
