<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Omnipay\Omnipay;
use App\Payment;
use Auth;
use DB;

class PaymentController extends Controller
{
    
    public $gateway;
 
    public function __construct()
    {
        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway->setClientId(env('PAYPAL_CLIENT_ID'));
        $this->gateway->setSecret(env('PAYPAL_CLIENT_SECRET'));
        $this->gateway->setTestMode(true);//set it to 'false' when go live
    }   
 
    public function index()
    {
        return view('package');
    }
 
    public function charge(Request $request)
    {
        $user = $request->user();
        $data = DB::table('users')->where('id', $user->id)->first(['vendorType']);
        $vendorvalue = $request->input('vendorValue');
        $vendortype = data_get($data, 'vendorType');

        if ($vendortype ==  $vendorvalue) {
                 return redirect('voucherdetails')->with('message', trans('Already Subscribed  , Add Vouchers Now!'));
         }else{
            if($request->input('submit'))
                 {
                     try {
                         $response = $this->gateway->purchase(array(
                             'amount' => $request->input('amount'),
                             'items' => array(
                                         array(
                                             'name' => $request->input('vendorValue'),
                                             'price' => $request->input('amount'),
                                             'description' => 'Vendor Subscription',
                                             'quantity' => 1,
                                             
                                         ),
                                     ),
                             'currency' => env('PAYPAL_CURRENCY'),
                             'returnUrl' => url('paymentsuccess'),
                             'cancelUrl' => url('paymenterror'),
                            
                         ))->send();

                   
                         if ($response->isRedirect()) {
                             $response->redirect(); // this will automatically forward the customer

                         } else {
                             // not successful
                             return $response->getMessage();
                         }
                     } catch(Exception $e) {
                         return $e->getMessage();
                     }
                 }
         }
    }
 
    public function payment_success(Request $request)
    {

        // Once the transaction has been approved, we need to complete it.
        if ($request->input('paymentId') && $request->input('PayerID'))
        {
            $transaction = $this->gateway->completePurchase(array(
                'payer_id'             => $request->input('PayerID'),
                'transactionReference' => $request->input('paymentId'),
            ));
            $response = $transaction->send();
         
            if ($response->isSuccessful())
            {
                // The customer has successfully paid.
                $arr_body = $response->getData();
                
         
                // Insert transaction data into the database
                $isPaymentExist = Payment::where('payment_id', $arr_body['id'])->first();
                $userid = Auth::user()->id;

                $test = $arr_body['transactions'][0]['description'];
                $transID = $arr_body['id'];
                $total = $arr_body['transactions'][0]['amount']['total'];

                if(!$isPaymentExist)
                {

                    $payment = new Payment;
                    $payment->payment_id = $arr_body['id'];
                    $payment->user_id = $userid;
                    $payment->payer_id = $arr_body['payer']['payer_info']['payer_id'];
                    $payment->payer_email = $arr_body['payer']['payer_info']['email'];
                    $payment->amount = $arr_body['transactions'][0]['amount']['total'];
                    $payment->currency = env('PAYPAL_CURRENCY');
                    $payment->payment_status = $arr_body['state'];
                    $data = DB::table('users')->where('id', $userid)->update(['vendorType' => $test]);
                    $payment->save();
                    
                }
         		return view('/invoice',compact('test','transID','total'));
            } else {
                return $response->getMessage();
            }
        } else {
            return 'Transaction is declined';
        }
    }
 
    public function payment_error()
    {
    	return redirect('package')->with('message', trans("You canceled the payment."));
      
    }
 
}
