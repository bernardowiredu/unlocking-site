<?php


class UserController extends BaseController {


	public function getDashboard(){

		return View::make('users.dashboard');
	}


	public function getProfile(){

		return View::make('users.editprofile');
	}



	public function getLogin(){

		return View::make('users.login');
	}




	public function getRegister(){

		return View::make('users.register');
	}



	public function postRegister() {


		$posted = Input::get();

		$rules = array(

		'username'=>'required|min:5|unique:users,username',
		'email'=>'required|email|unique:users',
		'password'=>'required|between:8,12|confirmed',
		'password_confirmation'=>'required|between:8,12',
		'telephone'=>'required'

		);

		 $validator = Validator::make($posted, $rules);


		 if($validator->passes()) {

            $user = new User;

            $user->username = $posted['username'];
            $user->email = $posted['email'];
            $user->telephone = $posted['telephone'];
            $user->password = Hash::make($posted['password']);
            $user->password_confirmation = $posted['password'];


            $user->save();
/*
            Mail::send('email.index', array('username'=>Input::get('username'), 'email'=>Input::get('email'), 'password'=>Input::get('password'), 'telephone'=>Input::get('telephone')), function($message){
            $message->from('bernardkissi18@gmail.com', 'PerfectUnlockgh');
            $message->to(Input::get('email'), Input::get('username'), Input::get('password'), Input::get('telephone'))->subject('Thanks for registering with us');
            });*/


            return Redirect::to('login')->with('success', 'You have successfully created an account, login now!');

        }else{

        	 return Redirect::to('register')->with('eror','registration failed, try again!!')->withErrors($validator)
			->withInput();

        }

	}


	public function postSignin() {

		$posted = Input::get();

		if (Auth::attempt(array('email'=>$posted['email'], 'password'=>$posted['password_confirmation']))) {
			return Redirect::to('/');
		}

		return Redirect::to('login')->with('error', 'Your email/password combination was incorrect');
	}



	public function getPassword(){

		return View::make('users.forgotten-password');
	}


	public function getSignout() {
		Auth::logout();
		return Redirect::to('login')->with('success', 'You have been signed out');
	}



	public function postForgottenPassword(){

            $posted = Input::get(); 

            $email = $posted['email'];
               
 
            $rules = array(
                    'email'=>'required|email'
                );

            $validator = Validator::make($posted, $rules);

            if($validator->passes()){

                try {

                    $user = User::where('email','=',$email)->firstorFail();

                    $password= $user->password_confirmation;
                    $username= $user->username;
                    $email= $user->email;
                    $firstname= $user->firstname;


                    $to      = $email;

                    $subject = " Iunlockgh Password Request";

                    $email_message =

                     "
                    ************************************************ 
                    Dear ". $username." your details are as follows : 

                    Username : $username
                    Email : $email
                    Login Password : $password 
                    
                    ************************************************
                    Regards, iunlockgh";

                    mail($to, $subject,  $email_message );

                    return Redirect::to('forgotten-password')->with('success', 'Password  has been sent successfully to <b>'.$email.'</b>.');

                }catch (Exception $e) {

                    return Redirect::to('forgotten-password')->with('error', 'We cant find a user with that e-mail address <b>'.$email.'</b>.');
                }
           
            }

            elseif($email != 'email'){
                return Redirect::to('forgotten-password')->with('error', 'We cant find a user with that e-mail address <b>'.$email.'</b>.');
            }

        }

}
