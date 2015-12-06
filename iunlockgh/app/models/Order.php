<?php

class Order extends Eloquent {

	protected $table = 'orders';

	public function networks() {
		return $this->belongdTo('Network');
	}

	public function payments() {
		return $this->belongdTo('Payment');
	}

	public function automateDelete($order) {
		$id = Order::find($order)->delete();
	}
}