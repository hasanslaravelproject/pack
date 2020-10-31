<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Subscription;
use Illuminate\Http\Request;

use Session;
use Stripe;


class StripePaymentController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe($total)
    {

        session(['total' => $total]);
        return view('stripe');
    }

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $pack = Subscription::where('id',session('pack_id'))->first();
        $s =Stripe\Charge::create ([
                "amount" => session('total') *100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment.",
                "metadata" => [
                    "total" => session('total'),
                ],
        ]);
/*
       if ($s){
           $hour = $pack->validity * 24;
           $expireday = date("Y-m-d H:i:s", strtotime('+'.$hour.' hours'));
           Client::where('id',$s->metadata['cli_id'])->update([
               'packageid' => $pack->packageid,
               'expirydate' => $expireday,
           ]);
       }

*/
        Session::flush();
        return redirect('clients');


    }
}
