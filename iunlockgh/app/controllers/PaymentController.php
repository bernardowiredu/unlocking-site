<?php


class PaymentController extends BaseController {


	public function getIndex(){

		return View::make('payments.index');
	}


	public function getTest() {

		return View::make('payments.test');
	}

	public function getConfirmation(){

		return View::make('bitcoin.confirmation');

	}




	public function getDetails($id){

		$payment = Payment::find($id);

		return View::make('payments.order-details')->with('payment',$payment);
	}


	public function getHistory(){

		$payment = Payment::where('user_id','=',Auth::user()->id)->get();

		return View::make('orders.order-history')->with('payment',$payment);
	}

	public function getPaymentDetails($id){

		$payment = Payment::find($id);

		return View::make('payments.order-details')->with('payment',$payment);
	}

	public function getAll(){

		$payments = Payment::paginate(15);
		return View::make('admin.payments')->with('payments', $payments);
	}

	public function getSuccess(){
		return View::make('payments.payment-successful');
	}


	public function postPayed(){

		$posted = Input::all();

		$order = $posted['id'];

		$verified = $posted['verified_code'];

		$generated = $posted['generated_code'];

		$api_key = '5526d8e9e0ebe5526d8e9e0f32';

        $phone = $posted['telephone'];

        $sender_id = 'iunlockgh';

        $message = 'Payment is completed. Your '. $posted['product_model'].' would be unlocked between '. $posted['delivery_time'].' Visit http://perfectunlockgh.com to view your order status';

        $pd = $posted['p_id'];

		$rules = array(

			'telephone' => 'numeric'
			
		);


		$validator = Validator::make($posted, $rules);

		if($validator->passes()) {

			if($verified != $generated){

				return Redirect::back()->with('error', 'The PAYCODE <b>' .$verified.'</b> entered is incorrect');
			}

			try{

			$url = "http://sms.nasaramobile.com/api?api_key=5526d8e9e0ebe5526d8e9e0f32&&sender_id=PerfectLTD&&phone=$phone&&message=".urlencode($message)."";

			/*$response = file_get_contents($url);*/

			$payment = new Payment;

			$payment->user_id = Auth::user()->id;
			$payment->product_model = $posted['product_model'];
			$payment->network_name = $posted['network_name'];
			$payment->price = $posted['price'];
			$payment->imei = $posted['imei'];
			$payment->image = $posted['image'];
			$payment->telephone = $posted['telephone'];
			$payment->generated_code = $posted['generated_code'];
			$payment->verified_code = $posted['verified_code'];
			$payment->delivery_time = $posted['delivery_time'];
			$payment->p_id = $posted['p_id'];
			$payment->found = '1';
			$payment->status = '0';
			
			$payment->save(); 

/*
            Mail::send('email.success', array('product_model'=>Input::get('product_model'), 'price'=>Input::get('price'), 'delivery_time'=>Input::get('delivery_time'), 'network_name'=>Input::get('netwwork_name'), 'imei'=>Input::get('imei')), function($message){
            $message->from('bernardkissi18@gmail.com', 'PerfectUnlockgh');
            $message->to('bernardkissi18@gmail.com', Input::get('product_model'), Input::get('price'), Input::get('delivery_time'), Input::get('network_name'))->subject('Payment successful');
            });*/

			Payment::automateDelete($order); 

			
           
			if($pd == 0){
			return Redirect::to('payment-successful')->with('complete', 'Your <b>'. $posted['product_model'].'</b> would be unlocked between <b>'. $posted['delivery_time'].'</b>.');	
			}else{
			 return Redirect::to('payment-successful')->with('complete', 'Your  phone information with IMEI <b>'. $posted['imei'].'</b> would sent to you within <b>'. $posted['delivery_time'].'</b>.');	
			}
			
			
			}catch (Exception $e){

			return Redirect::back()->with('error', 'The paycode you entered is incorrect ')->withErrors($validator);
		}

			
		}


	}

			public function getTrackOrderSearch() {

				$keyword = Input::get('keyword');
				$payments = Payment::where('imei', '=', $keyword)->get();
				$read = count($payments);
				$payments = Payment::where('imei', '=', $keyword)->get();
				return View::make('orders.order-status')->with('keyword', $keyword)
				->with('payments', $payments)->with('read', $read);
			}




			public function getTrackOrder() {

				$keyword = Input::get('keyword');
			
				$payments = Payment::where('imei', '=', $keyword)->get();
				return View::make('orders.track-order')->with('keyword', $keyword)
				->with('payments', $payments);
			}
				

		public function getTrack(){

			$keyword = Input::get('keyword');

			$payments = Payment::where('imei', '=', $keyword)->get();

			return View::make('orders.track-order')->with('keyword', $keyword)->with('payments',$payments);




		}




	public function postAccountPay(){

		$posted = Input::all();

		$order = $posted['id'];

		$user_account = Auth::user()->balance;

		$price = $posted['price'];

		$password = $posted['password'];

		$api_key = '5526d8e9e0ebe5526d8e9e0f32';

        $phone = $posted['telephone'];

        $sender_id = 'iunlockgh';

        $message = 'Payment is completed. Your '. $posted['product_model'].' would be unlocked between '. $posted['delivery_time'].' Visit http://perfectunlockgh.com to view your order status';

        $pd = $posted['p_id'];

		$rules = array(

			'password' => 'required'
			
		);


		$validator = Validator::make($posted, $rules);

		if($validator->passes()) {

			if($user_account == 0 || $user_account < $price){

				return Redirect::back()->with('error', 'Your balance to is not enough to complete order!');
			}

			if(Auth::user()->password_confirmation != $password){

				return Redirect::back()->with('error', 'Account verification failed, try again!');
			}

			try{

			$url = "http://sms.nasaramobile.com/api?api_key=5526d8e9e0ebe5526d8e9e0f32&&sender_id=PerfectLTD&&phone=$phone&&message=".urlencode($message)."";

			$response = file_get_contents($url);

			Payment::substractCredit($price);

			$rand = mt_rand(10000,99999);

			$payment = new Payment;

			$payment->product_model = $posted['product_model'];
			$payment->network_name = $posted['network_name'];
			$payment->price = $posted['price'];
			$payment->imei = $posted['imei'];
			$payment->telephone = $posted['telephone'];
			$payment->generated_code = $rand;
			$payment->verified_code = $rand;
			$payment->delivery_time = $posted['delivery_time'];
			$payment->p_id = $posted['p_id'];
			$payment->found = '1';
			$payment->status = '0';
			
			$payment->save();

			Payment::automateDelete($order);

			
			if($pd == 0){
			return Redirect::to('payment-successful')->with('complete', 'Your <b>'. $posted['product_model'].'</b> would be unlocked between <b>'. $posted['delivery_time'].'</b>.');
			}else{
			 return Redirect::to('payment-successful')->with('complete', 'Your  phone information with IMEI <b>'. $posted['imei'].'</b> would sent to you within <b>'. $posted['delivery_time'].'</b>.');
			}
			
			
			}catch (Exception $e){

			return Redirect::back()->with('error', 'The paycode you entered is incorrect ')->withErrors($validator);
		}

			
		}
		


	}
		
}