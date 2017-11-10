<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Order;
use App\OrderDetail;
use App\ShippingInfo;
use DB;
use Illuminate\Http\Request;

class OrderController extends Controller
{
   public function showOrderManageTable(){
    // $orders =  Order::all();
     //return $orders;
       $orders = DB::table('orders')
           ->join('customers','orders.customer_id','=','customers.id')
           ->join('payments','orders.id','=','payments.order_id')
           ->select('orders.*','customers.customer_name','payments.payment_type','payments.payment_status')
           ->orderBy('id','desc')
           ->get();
       //return $orders;
       return view('admin.order.manage-order',[
           'orders'=>$orders
       ]);
   }

   public function viewOrderDetails($id){

       $order = Order::find($id);
       $customer = Customer::find($order->customer_id);
       $shippingInfo = ShippingInfo::find($order->shipping_id);
       $orderProducts = OrderDetail::where('order_id',$order->id)->get();
     //  return $products;

            //return $products;
            return view('admin.order.view-order',[
                'customer'=>$customer,
                'shippingInfo'=>$shippingInfo,
                'orderProducts'=>$orderProducts
            ]);
   }

   public function editOrder($id){
       return view('admin.order.edit-order');
   }

















}
