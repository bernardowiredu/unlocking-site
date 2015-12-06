<?php

/**
* Controller for the namespace Gevey 
*/
class GeveyController extends BaseController 
{
	
	public function postGevey()
	{
		$posted = Input::get();

		 $message = 'Customer with '. $posted['telephone'].' requested for the purchase of '. $posted['quantity'].' '. $posted['gevey_name'].' Admin should call him now!!';

		 $email = 'info.perfectunlockgh@gmail.com';

		try{

			$url = "http://sms.nasaramobile.com/api?api_key=5526d8e9e0ebe5526d8e9e0f32&&sender_id=PerfectLTD&&phone=0205223791&&message=".urlencode($message)."";

			$response = file_get_contents($url);

			$gevey = new Gevey;
			$gevey->telephone = $posted['telephone'];
			$gevey->quantity = $posted['quantity'];
			$gevey->gevey_name = $posted['gevey_name'];

			$gevey->save();

			/*simple email sending function*/

			        $to      = $email;

                    $subject = " Perfectunlockgh Gevey Request";

                    $email_message =

                     " 
                   ******************************************************
                                 PerfectUnlockgh gevey request*
                    ****************************************************** 
                    A customer requested for a gevey sim: 

                    PURCHASE DETAILS

                    Contact number : ".$posted['telephone']."
                    Gevey requested :  ".$posted['gevey_name']."
                    Quantity needed : ".$posted['quantity']." 
                    Price : GH₵ 75;
                    ******************************************************, 
                    Perfectunlockgh Customer service";

                    mail($to, $subject,  $email_message );

              /*function ends here*/

			return Redirect::back()->with('success', 'You have successfully  requested for the purchase of our gevey sim, you wil be soon be contacted');
		
			}catch (Exception $e){
				return Redirect::back()->with('error', 'Your order failed, please try again');
			}
	}
}