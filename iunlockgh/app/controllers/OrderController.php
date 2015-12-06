<?php


class OrderController extends BaseController {


	public function getStatus(){

		return View::make('orders.order-status');
	}


	
	public function getConfirmationVerified($id){


		$order = Order::find($id);
		return View::make('bitcoin.transfer-verified')->with('order', $order);;

	}




	public function getPay($id){


		$order = Order::find($id);
		return View::make('orders.pay')->with('order', $order);;

	}


	public function getBitcoinPayment($id){
    	
		$order = Order::find($id);
    	return View::make('bitcoin.bitcoin_payment')->with('order', $order);
    }

    


/*
	public function getTrack(){

		return View::make('orders.track-order');
	}
*/

	public function getPayment($id){
		$order = Order::find($id);

		return View::make('orders.make-payment')->with('order', $order);
	}


	public function getConfirm(){

		$orders = Order::where('user_id','=',Auth::user()->id)->get();
		
		$count_orders = count($orders);
		return View::make('products.confirm-order')->with('orders', $orders)->with('count_orders', $count_orders);
	}

	public function getOrder(){

		$orders = Order::all();
		return View::make('admin.order')->with('orders', $orders);
	}

	public function getCheckOrder(){

		return View::make('orders.check_order');
	}

	public function getDelete($id){

		$order = Order::find($id)->delete();

		return Redirect::to('products/1');


	}


	public function postPayOrder(){


	/*if(Request::ajax()){*/

		$posted = Input::all();

		$rules = array(

			'imei' => 'min:15|numeric|required',
			'order_contact' => 'required'

		);


		$validator = Validator::make($posted, $rules);

			if($validator->passes()) {

			/*$url = 'http://localhost/iunlockgh/public/confirm-order';*/
			$your_order = Order::where('user_id','=',Auth::user()->id)->get();
				$counter = count($your_order);	
				if($counter > 0){

					return Redirect::back()->with('warning', 'You have already placed an order, complete that order before placing new');
				}

			/*for($s=0; $s<10; $s++){
	                $possible = '0123456789';
	                $code = '';
	                $i = 0;
	                while($i < 7){
	                    $code .= substr($possible, mt_rand(0, strlen($possible)+1),1);

	                    $i++;
	                }
	            }*/

	        $code = mt_rand(10000,99999);

			
			$order = new Order;

			$order->user_id = Auth::user()->id;
			$order->product_name = $posted['product_name'];
			$order->network_name = $posted['network_name'];
			$order->price = $posted['price'];
			$order->email =$posted['email'];
			$order->imei = $posted['imei'];
			$order->delivery = $posted['delivery'];
			$order->status = 'processing';
			$order->order_contact =  $posted['order_contact'];;
			$order->order_code =$code;
			$order->net_id = $posted['network_name'];
			$order->image = $posted['image'];
			$order->image2 = $posted['image2'];
			$order->p_id = $posted['p_id'];
			
			$order->save();

			
          /*  Mail::send('email.order', array('product_name'=>Input::get('product_name'), 'price'=>Input::get('price'), 'delivery'=>Input::get('delivery'), 'network_name'=>Input::get('network_name'), 'imei'=>Input::get('imei')), function($message){
            $message->from('bernardkissi18@gmail.com', 'PerfectUnlockgh');
            $message->to(Input::get('email'), Input::get('product_name'), Input::get('price'), Input::get('delivery'), Input::get('network_name'))->subject('You have successfully created your order');
            });*/

			
		    return Redirect::to('confirm-order')->with('message','Ensure to complete order within 48hrs else 
		    	order will be automatically deleted ');;

			}else{
			return Redirect::back()->with('error','To create order, Enter a correct IMEI');
	
		}
	}







	public function postImeiOrder(){


	/*if(Request::ajax()){*/

		$posted = Input::all();

		$product = $posted['network_name'];

		$rules = array(

			'imei' => 'min:15|numeric|required',
			'order_contact' => 'required'

		);


		$validator = Validator::make($posted, $rules);

			if($validator->passes()) {

			/*$url = 'http://localhost/iunlockgh/public/confirm-order';*/
			$your_order = Order::where('user_id','=',Auth::user()->id)->get();
				$counter = count($your_order);	
				if($counter > 0){

					return Redirect::back()->with('warning', 'You have already placed an order, complete that order before placing new');
				}

			/*for($s=0; $s<10; $s++){
	                $possible = '0123456789';
	                $code = '';
	                $i = 0;
	                while($i < 7){
	                    $code .= substr($possible, mt_rand(0, strlen($possible)+1),1);

	                    $i++;
	                }
	            }*/

	            $code = mt_rand(10000,99999);

			
			$order = new Order;

			$order->user_id = Auth::user()->id;
			if($product == 1){
				$order->network_name = 'Network Lock Check ';
			}elseif ($product == 2) {
				$order->network_name = 'Blacklisted/Barred/clean imei';
			}elseif($product == 3){
				$order->network_name = 'Free iCloud check';
			}else{
				$order->network_name = 'Sprint USA - All iPhone Eligibility Test Clean/Blacklist/Unpaid Bill';
			}
			

			$order->product_name = $posted['product_name'];
			$order->price = $posted['price'];
			$order->email =$posted['email'];
			$order->imei = $posted['imei'];
			$order->delivery = $posted['delivery'];
			$order->status = 'processing';
			$order->order_contact =  $posted['order_contact'];;
			$order->order_code =$code;
			$order->net_id = $posted['network_name'];
			$order->p_id = $posted['p_id'];
			
			$order->save();


           /* Mail::send('email.order', array('product_name'=>Input::get('product_name'), 'price'=>Input::get('price'), 'delivery'=>Input::get('delivery'), 'network_name'=>Input::get('netwwork_name'), 'imei'=>Input::get('imei')), function($message){
            $message->from('bernardkissi18@gmail.com', 'PerfectUnlockgh');
            $message->to(Input::get('email'), Input::get('product_name'), Input::get('price'), Input::get('delivery'), Input::get('network_name'))->subject('You have successfully created your order');
            });
*/
			
		    return Redirect::to('confirm-order')->with('message','Ensure to complete order within 48hrs else 
		    	order will be automatically deleted ');;

			}else{
			return Redirect::back()->with('error','To create order, Enter a correct IMEI');
	
		}
	}



		


				public function postCode(){

					$posted = Input::get();
					$order_id = $posted['id'];
					$code = $posted['code'];
					$phone = $posted['order_contact'];

					 $message = 'Your Payment Code is '. $posted['code'].'. Thanks for your order. Visit http://perfectunlockgh.com/make-payment/'.$order_id.' follow link to make payment.';


					try{

						$url = "http://sms.nasaramobile.com/api?api_key=5526d8e9e0ebe5526d8e9e0f32&&sender_id=PerfectLTD&&phone=$phone&&message=".urlencode($message)."";

						$response = file_get_contents($url);


						return Redirect::back()->with('success', 'Payment Code '. $posted['code'].' has been sent.');

					}catch (Exception $e){

						return Redirect::back()->with('error', 'Sending of code failed');
					}

				}
				
}