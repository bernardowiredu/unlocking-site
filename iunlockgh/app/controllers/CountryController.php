<?php


class CountryController extends BaseController {


	public function postCountry(){

		$posted = Input::get();

		$country = new Country;


		$country->country_name = $posted['country_name'];
		$country->category_id = $posted['category_id'];
		$country->category_name = $posted['category_name'];
		$country->save();


		return Redirect::back()->with('success', 'Country has been created');

	}



		

}