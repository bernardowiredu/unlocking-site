<?php


class UpdateController extends BaseController{

	public function getNews(){

		return View::make('admin.news');
	}




	public function postNewsPost(){


		$posted = Input::get();
		$update = new Update;

		$update->message = $posted['message'];
		$update->date = $posted['date'];
	 
		$update->save();

		return Redirect::to('admin/news')->with('success', 'New update has been posted');
	}



}