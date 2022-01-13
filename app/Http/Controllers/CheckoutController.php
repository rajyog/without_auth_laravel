<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Form;
use App\Models\Tbl_registration;
use App\Models\Payment;

class CheckoutController extends Controller
{
    public function checkout()
    {   
        // Enter Your Stripe Secret
        \Stripe\Stripe::setApiKey('sk_test_51K93qvSDFEHS9K1GeQTVf3AGQ1QcDw33fNnAz46tJZf3CkBLIN0jsDp8BPPLP30DNTZyLJgYeQChiJ21v2Jeq2kc00jWYgkWiu');
        		
		$amount = 100;
		$amount *= 100;
                $amount = (int) $amount;
        
        $payment_intent = \Stripe\PaymentIntent::create([
			'description' => 'Student Fees Payment',
			'amount' => $amount,
			'currency' => 'INR',
			'description' => 'Payment From H.K.katrodiya',
//                        'customer'=>'Harshal',
			'payment_method_types' =>['card'],
		]);
            $intent = $payment_intent->client_secret;
//        echo "<pre>";
//        print_r($payment_intent);
//        echo "</pre>";
//        die();
             $stripe = new Payment;  
             $stripe->amount = $payment_intent->amount;
             $stripe->currency = $payment_intent->currency;
             $stripe->payment_type = $payment_intent->payment_method_types[0];
             $stripe->status = $payment_intent->status;
             $stripe->description = $payment_intent->description;
             $stripe->stripe_payment_intent_id = $payment_intent->client_secret;
             $stripe->save();
             return view('checkout.credit-card',compact('intent'));
           
    }
    public function afterPayment(Request $res)
    {
//        echo "<pre>";
//        print_r($res->all());
//        echo "</pre>";
//        die();
//              
//
//        echo "<pre>";
//        print_r($res->all());
//        echo "</pre>";
//        die();
//                $i=301;
//                $stripe = new Payment;  
//                $stripe->payer_email = $payment_intent->receipt_email;
//                $stripe->amount = $payment_intent->amount;
//                $stripe->currency = $payment_intent->currency;
//                $stripe->payment_type = $payment_intent->payment_method_types;
//                $stripe->status = $payment_intent->status;
//                $stripe->description = $payment_intent->description;
//                $stripe->stripe_payment_intent_id = $i ;
//                $i++;
//                $stripe->save();
        echo "Payment Has been Received";
    }
    public function payment() {
       return view('pay');
       
    }
    
    
}
?>
