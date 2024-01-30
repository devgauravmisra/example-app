<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class FormController extends Controller
{
    public function submit(Request $request)
    {
        $amount= $request->input('orderamount');
        $notes= $request->input('ordernote');
        $name = $request->input('customername');
        $email = $request->input('customeremail');
        $phone= $request->input('cuatomerphone');
       
        $frmData = array(

            'order_id' => 'OrderId'.rand(),
            'order_amount' => $amount,
            'order_note' =>    $notes,
            'order_currency' => 'INR',
       
       'customer_details' => array(
            'customer_id' => 'customer_'.rand(),
            'customer_name' => $name,
            'customer_phone' =>  $phone,
            'customer_email' =>  $email
           
       ),
       'order_meta'=> array(
             'return_url' => route('payment.success').'?order_id={order_id}',
              // 'return_url' => 'https://www.google.com/?order_id={order_id}',
              'notify_url' => 'https://webhook.site/3efcf1b2-8610-4289-b40c-ea458f4bd4e0',
           // 'payment_methods'=>"upi" 
       )
       );
       //dd($request->all());
              $url = "https://sandbox.cashfree.com/pg/orders";
            
               $data_string = json_encode($frmData );
              
               $ch = curl_init();
               curl_setopt($ch, CURLOPT_URL, "$url");
               curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 20);
               curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
               curl_setopt($ch, CURLOPT_POST, true);
               curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
               curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
               curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
               curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
               curl_setopt(
                   $ch,
                   CURLOPT_HTTPHEADER,
                   array(
                       'Accept: application/json',
                       'x-api-version: 2022-09-01',
                       'Content-Type: application/json',
                       'x-client-id: 13764729ed596674a0f96e06f3746731',
                       'x-client-secret: 1f4ee1fd095fcd3cfa702f0c91389c8adca03b5a'
                   )
               );
       
               $result = curl_exec($ch);
               $returnCode = (int)curl_getinfo($ch, CURLINFO_HTTP_CODE);
               curl_close($ch);
           //    $resp = json_decode($result, true);
              // dd( $resp);
            // Decode the JSON response
            $resp = json_decode($result, true);

            // Check if the index exists before accessing it
            if (isset($resp['payment_session_id'])) {
                $session = $resp['payment_session_id'];
            } else {
                // Handle the case where the index doesn't exist
                // For example, you can set a default value or throw an exception
                $session = null; // Or throw an exception: throw new Exception("payment_session_id not found");
            }

       // dd($paymentSessionId); 
        return view('payment.submit', compact('session'));
    }

    public function success(Request $request)
    {
        // Retrieve any data passed from the payment success page, if needed
        $orderId = $request->input('order_id');
        $paymentId = $request->input('payment_id');
        
        // Perform any additional logic, such as updating the order status in the database
        // For example, you can retrieve the order based on the $orderId and update its status
        
        // Return a view to display a success message or perform any other action
        return view('payment.success', compact('orderId', 'paymentId'));
}
}