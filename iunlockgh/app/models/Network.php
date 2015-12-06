<?php

class Network extends Eloquent {


	protected $table = 'networks';

	public function countrys() {
		return $this->belongsTo('Country');
	}
}
