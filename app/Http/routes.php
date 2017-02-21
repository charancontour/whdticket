<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');


/**
 * Admin Routes.
 */
Route::get('dashboard','AdminController@index');

/**
 * Registration Routes.
 */
Route::get('register','RegistrationController@create');
Route::post('register','RegistrationController@store');



/**
 * Payment Request.
 */

Route::get('payment/{registration_id}','PaymentController@index');
Route::post('/paytm','PaymentController@sendRequestToPaytm');
Route::post('/paytm/callback','PaymentController@callbackRequestFromPaytm');


Route::get('success',function(){
	return view('payment.success');
});

Route::get('failure',function(){
	return view('payment.failure');
});

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
