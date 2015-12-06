<?php


class BtcController extends BaseController {


	public function getAdminBtc() {

		$btcs = Btc::all();

		return View::make('admin.btcs')->with('btcs', $btcs);
	}

	public function postBtc() {

		$posted = Input::get();


		$rules =  array(

			'payment_hash' => 'required'

			);


		$validator = Validator::make($posted, $rules);

		if($validator->passes()){

			$btc = new Btc;

			$btc->user_id = Auth::user()->id;
			$btc->price = $posted['price'];
			$btc->btc_cash = $posted['btc_cash'];
			$btc->payment_hash = $posted['payment_hash'];
			
			$btc->save();


			return Redirect::to('confirmation');

			}else{

				return Redirect::back()->with('error', 'Please enter payment hash');
			}

		}




		public function putUpdateStatus() {

			$posted = Input::get();

			$payment_hash = $posted['payment_hash'];

			$verify = $posted['verify'];

			$rules = array(

				'payment_hash' => 'required'

			);

			$validator = Validator::make($posted, $rules);

			if($validator->passes()) {

				if($payment_hash != $verify) {

					return Redirect::back()->with('error', 'Bitcoin transfer could not be verified');
				}

				$status_id = $posted['id'];

				$btc = Btc::find($status_id);

				$btc->verification = '2';
				$btc->verify = $posted['verify'];

				$btc->save();

				Mail::send('email.transfer', array( $status_id = Input::get('id'), 'verify'=>Input::get('verify')), function($message){
	            $message->from('bernardkissi18@gmail.com', 'PerfectUnlockgh');
	            $message->to('bernardkissi18@gmail.com', Input::get('id'), Input::get('verify'))->subject('Your bitcoin transfer has been verified');
	        });

				return Redirect::back()->with('success', 'Bitcoin transfer has been verified');

			}else{

			return Redirect::back()->with('error', 'Fill the payment hash form before posting');
		}

			

		}

		

}