<?php


class UnlockController extends BaseController {


	public function getIndex(){

		return View::make('request.index');
	}


	public function getUnlockRequest(){

		return View::make('request.unlock-request');
	}


	public function getAllRequest(){

		return View::make('admin.unlock');
	}

	public function postRequest(){

		$posted = Input::all();

		$message = 'Customer Unlock Request. Telephone: '. $posted['telephone'].' IMEI: '. $posted['imei'].' Phone: '. $posted['model'].' Network Locked to: '. $posted['brand'].' contact him soon';

		$phone = $posted['telephone'];

		$rules = array(

			'imei' => 'Required'
			
		);

		$validator = Validator::make($posted, $rules);


		if($validator->passes()) {

			try{

			$url = "http://sms.nasaramobile.com/api?api_key=5526d8e9e0ebe5526d8e9e0f32&&sender_id=PerfectLTD&&phone=0545343660&&message=".urlencode($message)."";
/*
			$response = file_get_contents($url);
*/		     $username = Auth::user()->username;

			$unlock = new Unlock;
			$unlock->user_id = Auth::user()->id;
			$unlock->brand = $posted['brand'];
			$unlock->model = $posted['model'];
			$unlock->telephone = $posted['telephone'];
			$unlock->carrier = $posted['carrier'];
			$unlock->imei = $posted['imei'];
			

			$unlock->save();

			/*Mail::send('email.request', array(=$username, 'brand'=>Input::get('brand'), 'imei'=>Input::get('imei'), 'model'=>Input::get('model'), 'carrier'=>Input::get('carrier'), 'telephone'=>Input::get('telephone')), function($message){
            $message->from('bernardkissi18@gmail.com', 'PerfectUnlockgh');
            $message->to(Input::get('bernardkissi18@gmail.com', $username, Input::get('password'), Input::get('telephone'))->subject('Customer unlock request');
            });*/
/*Mail::send('email.index', array($username, 'carrier'=>Input::get('carrier'), 'imei'=>Input::get('imei'), 'brand'=>Input::get('brand'), 'model'=>Input::get('model'), 'telephone'=>Input::get('telephone')), function($message){
            $message->from('bernardkissi18@gmail.com', 'PerfectUnlockgh');
            $message->to('bernardkissi18@gmail.com', $username, Input::get('carrier'), Input::get('imei'), Input::get('brand'), Input::get('model'), Input::get('telephone'))->subject('Thanks for registering with us');
            });*/

			return Redirect::back()->with('success','You have successfully made a request, you will be contacted soon,<b>'  .Auth::user()->username.'</b>');
			}catch (Exception $e){
				return Redirect::back()->with('error','Your Request due to errors has failed. Fill form correctly and try again');
			}
		}
	}

}


