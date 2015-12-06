<?php



class ImeiController extends BaseController {


	public function getIndex(){

	return View::make('imei-checker.index');

	}


	/*public function postImei(){
		$posted= Input::all();


		$rules = array(

			'imei' => 'required'

		);

		$validator = Validator::make($posted, $rules);

		if($validator->passes()){

			$imei = new Imei;

			$imei->user_id = $posted['user_id'];
			$imei->imei_number = $posted['imei_number'];
			$imei->telephone = $posted['telephone'];

			$imei->save();


			return Redirect::back()->with('success', '')

		}

	}*/

	
}