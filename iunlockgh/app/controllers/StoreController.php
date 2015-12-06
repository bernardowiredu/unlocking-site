<?php

class StoreController extends BaseController {

	public function getIndex(){

		return View::make('store.index');
	}


	public function getStore(){

		return View::make('store.purchase');
	}



	public function getEmail(){


		return View::make('email.index');
	}





}

