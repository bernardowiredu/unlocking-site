<?php

class ContactController extends BaseController {


	public function postReport(){

		$posted = Input::get();



		$contact = new Contact;
		$contact->username =  Auth::user()->username;
		$contact->email_address = $posted['email_address'];
		$contact->title = $posted['title'];
		$contact->type = $posted['type'];
		$contact->description = $posted['description'];


		$contact->save();


         Mail::send('email.contact', array('username'=>Input::get('name'), 'title'=>Input::get('title'), 'type'=>Input::get('type'), 'description'=>Input::get('description'), 'imei'=>Input::get('imei')), function($message){
         $message->from('bernardkissi18@gmail.com', 'PerfectUnlockgh');
         $message->to('bernardkissi18@gmail.com', Input::get('username'), Input::get('title'), Input::get('type'), Input::get('description'))->subject('Customer report tickets');
        });


		return Redirect::back()->with('success', 'Your report has been sent, we will assist you shortly');

	}
}