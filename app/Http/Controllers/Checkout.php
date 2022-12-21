<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Http\RedirectResponse;
use Cart;
session_start();

class Checkout extends Controller
{
  
	
	public function checkout ()
	{
	 $cid=Session::get('customer_id');
	  if($cid){	
        $cats=  $this->getcats();
		$shops= $this->getshops();
		$customer= DB::table('customer')->where('id',$cid)->first();
		
		return view('pages.checkout')->with('shops',$shops)->with('cats',$cats)->with('customer',$customer);
	  }else{
		  Session::put('page','checkout');
		  return Redirect('login-check');
	  }
	}
	public function order (Request $request)
	{
	 
	 $cid=Session::get('customer_id');
	// add shipping data	
	 $shipping_data=array();
	 $shipping_data['userId']=$cid;

	 $shipping_data['shipping_name']=$request->name;
	 $shipping_data['shipping_phone']=$request->phone;
	 $shipping_data['shipping_address']=$request->address;
	 $shippingId= DB::table('shipping')->insertGetId($shipping_data);
	
	// add payment data
	$payment_data= array();
	 $payment_data['userId']=$cid;
	 $payment_data['type']=$request->payment;
	 $payment_data['status']=0;
	 $paymentId= DB::table('payment')->insertGetId($payment_data);
	
	// add order data
	 $data['sessionId']=Session::getId();
	 $data['message']=$request->message;
	 $data['userId']=$cid;
	 $data['payment']=$paymentId;
	 $data['shippingId']=$shippingId;
	 $data['status']=0;
		
	 $data['subTotal']=Cart::subTotal();
	 $data['tax']=Cart::tax();
	 $data['discount']=Cart::discount();
	 $data['total']=Cart::total();;
	 $data['grandTotal']=Cart::total();;
	 
	 $order_id= DB::table('orders')->insertGetId($data);
	 
	 // add order items data
	 $items= Cart::content();
	foreach($items as $item) {
		$tmp = array();
		$tmp['orderId']=$order_id;	
		$tmp['productId']=$item->id;	
		$tmp['quantity']=$item->qty;	
		$tmp['price']=$item->price;	
		
		 $result= DB::table('order_item')->insert($tmp);
				
	}
	Cart::destroy();
	return Redirect('order-history');
	 
	}
	
	 public function getshops(){
		  
		  $shops= DB::table('shop')->where('public',1)->orderby('id','DESC')->get();
		 foreach ($shops as $shop){
			 
			 $products= DB::table('product')->where('public',1)->where('shop',$shop->id)->get();
			 $shop->pronum = count($products);
		 }
		 return $shops;
	  }
	  
	   public function getcats(){
		  
		$cats= DB::table('category_product')->where('public',1)->where('parent',0)->orderby('id','DESC')->get()->toArray();
		
		foreach ($cats as $cat){
			 $childs= DB::table('category_product')->where('public',1)->where('parent',$cat->id)->orderby('id','DESC')->get();
			$cat->childs = $childs;
			$cat->numchild = count($childs);
		 }
		 
		usort($cats , function($a, $b){return $a->numchild < $b->numchild; });
		
		 return $cats;
	  }
	  
}
