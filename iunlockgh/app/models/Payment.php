<?php

class Payment extends Eloquent {

	protected $table = 'payments';

	public function networks() {
		return $this->belongdTo('Order');
	}


	public function users() {
		return $this->belongdTo('User');
	}



	public static function automateDelete($order) {

		$orders = Order::find($order);
		$id = Order::find($order)->delete();
	}



	public static function substractCredit($price){



		$user = user::find(Auth::user()->id);

		$user_credit = $user->balance;

		$user->balance = $user_credit - $price;
 
		$user->save();
	}
}