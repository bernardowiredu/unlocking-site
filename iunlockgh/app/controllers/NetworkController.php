<?php

/**
* Controller intiation
*/
class NetworkController extends BaseController {


	public function getNetwork(){

		$networks = Network::paginate(15);

		return View::make('admin.networks')->with('networks', $networks);
	}


	public function postNetwork(){

		$posted = Input::all();


		$Network = new Network;

		$Network->category_id = $posted['category_id'];
		$Network->country_id = $posted['country_id'];
		$Network->network_name = $posted['network_name'];
		$Network->delivery_time = $posted['delivery_time'];
		$Network->price = $posted['price'];

		$Network->save();


		return Redirect::back()->with('success','Network has been successfully added');


	}

	




}