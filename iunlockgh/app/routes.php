<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

/*******************************USER CONTROLLER************************/

Route::group(array('before'=>'guest'), function(){

Route::get('login', array('uses'=>'UserController@getLogin'));
Route::get('register', array('uses'=>'UserController@getRegister'));
Route::get('forgotten-password', array('uses'=>'UserController@getPassword'));
Route::post('user', array('before'=>'csrf', 'uses'=>'UserController@postRegister'));
Route::post('login', array('before'=>'csrf', 'uses'=>'UserController@postSignin'));
Route::post('forgotten-password', array('uses'=>'UserController@postForgottenPassword'));

});

Route::get('dashboard', array('uses'=>'UserController@getDashboard'));
Route::get('editprofile', array('uses'=>'UserController@getProfile'));
Route::get('signout', array('uses'=>'UserController@getSignout'));

/*********************************CHECKMEND CONTROLLER********************/
Route::get('checkmend', array('uses'=>'CheckmendController@getIndex'));

/********************************PRODUCT CONTROLLER***********************/
Route::get('product/{id}', array('uses'=>'ProductController@getProduct'));
Route::get('search', array('uses'=>'ProductController@getProductSearch'));


/******************************IMEI CHECKER******************************/


/*****************************UNLOCK CONTROLLER*************************** */
Route::get('request', array('uses'=>'UnlockController@getIndex'));
Route::get('unlock-request', array('uses'=>'UnlockController@getUnlockRequest'));
Route::post('request', array('uses'=>'UnlockController@postRequest'));


/**************************HELP CONTROLLER******************************** */
Route::get('unlock-help', array('uses'=>'HelpController@getUnlock'));
Route::get('report', array('uses'=>'HelpController@getReport'));
Route::get('FAQs', array('uses'=>'HelpController@getFAQs'));
Route::get('payment-help', array('uses'=>'HelpController@getPaymentHelp'));
Route::get('about-us', array('uses'=>'HelpController@getAbout'));
Route::get('privacy', array('uses'=>'HelpController@getPrivacy'));



/*******************************PAYMENT CONTROLLER*************************/

Route::get('order-history', array('uses'=>'PaymentController@getHistory'));
Route::get('payments', array('uses'=>'PaymentController@getIndex'));
Route::get('payments', array('uses'=>'PaymentController@getIndex'));
Route::get('payment-successful', array('uses'=>'PaymentController@getSuccess'));
Route::post('payment', array('uses'=>'PaymentController@postPayed'));
Route::post('pay', array('uses'=>'PaymentController@postAccountPay'));
Route::get('order-status', array('uses'=>'PaymentController@getTrackOrderSearch'));
Route::get('track-order', array('uses'=>'PaymentController@getTrack'));
Route::get('order-details/{id}', array('uses'=>'PaymentController@getDetails'));
Route::get('payment-details/{id}', array('uses'=>'PaymentController@getPaymentDetails'));
Route::get('confirmation', array('uses'=>'PaymentController@getConfirmation'));

/**************************ORDER CONTROLLER****************************** */

Route::get('confirm-order', array('uses'=>'OrderController@getConfirm'));
Route::get('delete/{id}', array('uses'=>'OrderController@getDelete'));
Route::get('pay/{id}', array('uses'=>'OrderController@getPay'));
Route::get('make-payment/{id}', array('uses'=>'OrderController@getPayment'));
Route::get('check_order', array('uses'=>'OrderController@getCheckOrder'));
Route::post('category', array('uses'=>'CategoryController@postCreate'));
Route::post('order', array('uses'=>'OrderController@postPayOrder'));
Route::post('imei', array('uses'=>'OrderController@postImeiOrder'));
Route::get('bitcoin_payment/{id}', array('uses'=>'OrderController@getBitcoinPayment'));
Route::get('transfer-verified/{id}', array('uses'=>'OrderController@getConfirmationVerified'));


/*************************MESSAGE CONTROLLER*********************** */
Route::get('messages', array('uses'=>'MessageController@getIndex'));


/*********************STORE CONTROLLER**********************************/
Route::get('store', array('uses'=>'StoreController@getIndex'));
Route::get('store/purchase', array('uses'=>'StoreController@getStore'));


/******************************VIEW SHARE*************************************/
View::share('catnav', Comment::take(4)->orderBy('created_at','DESC')->get());
View::share('upnav', Update::take(2)->orderBy('created_at','DESC')->get());
View::share('products', Product::all());
/****************************************************************************/


Route::get('imei-checker', array('uses'=>'ImeiController@getIndex'));


/*Route::get('order-status', array('uses'=>'OrderController@getStatus'));*/

/*Route::get('track-order', array('uses'=>'OrderController@getTrack'));*/




Route::get('products/{id}', array('uses'=>'CategoryController@getproducts'));





Route::get('blog', array('uses'=>'BlogController@getIndex'));






Route::get('reseller', array('uses'=>'ResellerController@getIndex'));
Route::post('contact', array('uses'=>'ContactController@postReport'));
Route::post('gevey', array('uses'=>'GeveyController@postGevey'));





Route::post('btc', array('uses'=>'BtcController@postBtc'));





Route::post('comment', array('uses'=>'CommentController@postComments'));


/********************ADMIN CONTROLLER**********************************/

Route::get('admin/login', array('uses'=>'AdminController@getAdminLogin'));


Route::group(array('before'=>'role'), function(){

Route::get('admin/categorys', array('uses'=>'CategoryController@getCategory'));
Route::post('product', array('uses'=>'ProductController@postCreate'));
Route::post('network', array('uses'=>'NetworkController@postNetwork'));
Route::get('admin/dashboard', array('uses'=>'AdminController@getDashboard'));
Route::get('admin/users', array('uses'=>'AdminController@getAllUsers'));
Route::get('admin/messages', array('uses'=>'AdminController@getMessage'));
Route::get('admin/order', array('uses'=>'OrderController@getOrder'));
Route::get('admin/payments', array('uses'=>'PaymentController@getAll'));
Route::get('admin/unlock', array('uses'=>'UnlockController@getAllRequest'));
Route::get('admin/add-product', array('uses'=>'ProductController@getAllPro'));
Route::get('admin/phones', array('uses'=>'ProductController@getAllProducts'));
Route::get('admin/networks', array('uses'=>'NetworkController@getNetwork'));
Route::post('country', array('uses'=>'CountryController@postCountry'));
Route::post('code', array('uses'=>'OrderController@postCode'));
Route::post('admin/news', array('uses'=>'UpdateController@postNewsPost'));
Route::get('admin/news', array('uses'=>'UpdateController@getNews'));
Route::get('admin/btcs', array('uses'=>'BtcController@getAdminBtc'));
Route::put('btcs-update', array('uses'=>'BtcController@putUpdateStatus'));

});


Route::get('email', array('uses'=>'StoreController@getEmail'));
