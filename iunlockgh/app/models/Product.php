<?php

class Product extends Eloquent {

protected $table = 'products';


public function category() {
		return $this->belongsTo('Category');
	}

public function networks() {
		return $this->hasMany('Network');
	}

	public function countrys() {
		return $this->hasMany('Country');
	}
}