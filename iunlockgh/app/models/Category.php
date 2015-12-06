<?php

class Category extends Eloquent {

	protected $table = 'categorys';

	protected $fillable = array('name');

	public static $rules = array('name'=>'required|min:3');

	public function products() {
		return $this->hasMany('Product');
	}

	public function networks() {
		return $this->hasMany('Network');
	}

	public function countrys() {
		return $this->hasMany('Country');
	}


}