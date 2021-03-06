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


Route::get('testpay','WelcomeController@testPayment');


/**
 * Admin Routes.
 */
Route::get('dashboard','AdminController@index');
Route::get('ticket/details/{id}','AdminController@ticketDetails');

//Agenda Routes.
Route::get('agenda/index',['middleware'=>'auth','uses'=>'AgendaController@index']);
Route::post('agenda/store',['middleware'=>'auth','uses'=>'AgendaController@store']);
Route::get('agenda/delete/{agenda_id}',['middleware'=>'auth','uses'=>'AgendaController@destroy']);
Route::get('api/agenda/response','AgendaController@apiResponse');

/**
 * Registration Routes.
 */
Route::post('registerform','RegistrationController@registerform');
Route::get('register','RegistrationController@create');
Route::post('register','RegistrationController@store');
Route::get('testregister',function(){
	return view('test.index');
});



/**
 * Payment Request.
 */

Route::get('payment/{registration_id}','PaymentController@index');
Route::post('/paytm','PaymentController@paymentHandle');
Route::post('/paytm/callback','PaymentController@callbackRequestFromPaytm');
Route::post('payumoney/callback','PaymentController@callbackRequestFromPayumoney');


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
