<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Order;
use App\OrderDetail;
use App\Payment;
use App\ShippingInfo;
use Cart;
use function GuzzleHttp\Psr7\parse_header;
use Illuminate\Http\Request;
use Mail;
use Session;


class CheckoutController extends Controller
{
    public function index(){
        return view('front.checkout.checkout');
    }


    public function saveCustomerInfo(Request $request){
        $this->validate($request,[
            'customer_name'=> 'required|regex:/^[\pL\s\-]+$/u',
            'customer_email'=> 'required|unique:customers,customer_email',
            'customer_password'=> 'required',
            'customer_mobile'=> 'required|regex:/(01)[5-9][0-9]{8}/',
            'customer_address'=> 'required',
        ]);

         $customer = new Customer();
        $customer->customer_name = $request->customer_name;
        $customer->customer_email = $request->customer_email;
        $customer->customer_password = bcrypt($request->customer_password);
        $customer->customer_mobile = $request->customer_mobile;
        $customer->customer_address = $request->customer_address;
        $customer->save();

        Session::put('customerId',$customer->id);
        Session::put('customerName',$customer->customer_name);

        $data = $customer->toArray();

        Mail::send('front.mail.congratulation-mail',$data,function ($message) use ($data){
            $message->to($data['customer_email']);
            $message->subject('Congratulation Mail');
        });

        return redirect('/shipping-info');
    }



    public function customerLogout(){
        Session::forget('customerId');
        Session::forget('customerName');
        return redirect('/');
    }

    public function customerLogin(Request $request){
       $customer = Customer::where('customer_email',$request->customer_email)->first();

      if ($customer){
          if (password_verify($request->customer_password,$customer->customer_password)){
              Session::put('customerId',$customer->id);
              Session::put('customerName',$customer->customer_name);

              return redirect('/shipping-info');

          }else{
              return redirect('/checkout')->with('message','Invalid Password !!');
          }
      }else{
          return redirect('/checkout')->with('message','Invalid Email !!');
      }


    }
    public function shippingInfo(){
        $customer = Customer::find(Session::get('customerId'));
       // return $customer;
        return view('front.checkout.shipping-info',[
                'customer'=>$customer
            ]);
    }


    public function showPaymentForm(){
        return view('front.checkout.payment-info');
    }


    public function saveShippingInfo(Request $request){
        $shippingInfo = new ShippingInfo();
        $shippingInfo->customer_name = $request->customer_name;
        $shippingInfo->customer_email = $request->customer_email;
        $shippingInfo->customer_mobile = $request->customer_mobile;
        $shippingInfo->customer_address = $request->customer_address;
        $shippingInfo->save();

        Session::put('shippingId',$shippingInfo->id);


        return redirect('/payment-info');
    }

    public function saveOrderInfo(Request $request){
       $paymentType = $request->payment_type;

      // return $paymentType;

        if ($paymentType == 'Cash on Delivery'){

            $order = new Order();

            $order->customer_id = Session::get('customerId');
            $order->shipping_id = Session::get('shippingId');
            $order->order_total = Session::get('grandTotal');
            $order->save();

           $paymentType =  new Payment();

            $paymentType->order_id  = $order->id;
            $paymentType->payment_type  = $request->payment_type;

            $paymentType->save();


            $cartProducts =  Cart::content();

            foreach ($cartProducts as $cartProduct){

                $orderDetail = new  OrderDetail();

                $orderDetail->order_id = $order->id;
                $orderDetail->product_id = $cartProduct->id;
                $orderDetail->product_name = $cartProduct->name;
                $orderDetail->product_price = $cartProduct->price;
                $orderDetail->product_quantity = $cartProduct->qty;
                $orderDetail->save();

            }

            Cart::destroy();
            return redirect('/');


        }
        elseif ($paymentType == 'BKash')
        {

        }
        elseif ($paymentType == 'Paypal')
        {

        }
    }





}
