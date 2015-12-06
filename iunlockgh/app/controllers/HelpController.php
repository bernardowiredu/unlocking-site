<?php


class HelpController extends BaseController {


	public function getUnlock(){

		return View::make('help.unlock-help');
	}


	public function getReport(){

		return View::make('help.report');
	}



	public function getFAQs(){

		return View::make('help.FAQs');
	}

	public function getAbout(){

		return View::make('help.about-us');
	}


	public function getPrivacy(){

		return View::make('help.privacy');
	}


	public function getPaymentHelp(){

		return View::make('help.payment-help');
	}
}