<?php


class Country extends Eloquent {

	protected $table = 'countrys';


	public function products() {
		return $this->hasManyThrough('Product');
	}

	public function networks() {
		return $this->hasMany('Network');
	}


}