<?php

/**
* Controller intiation
*/
class AdminController extends BaseController
{
	

	public function getDashboard(){

		return View::make('admin.dashboard');
	}



	/**/


	public function getAllUsers(){

		return View::make('admin.users');
	}


	public function getMessage(){

		return View::make('admin.messages');
	}
	

	public function getAdminLogin(){

		return View::make('admin.login');
	}

}