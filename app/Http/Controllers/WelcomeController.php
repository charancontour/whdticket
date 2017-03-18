<?php namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Http\Request;
use Softon\Indipay\Facades\Indipay; 

class WelcomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest');
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('welcome');
	}

	public function testPayment(){
		/* All Required Parameters by your Gateway */

      $parameters = [
        'tid' => '1233221223322',
        'order_id' => '1232212',
        'amount' => '12.00',
        'firstname' => 'charan',
        'email' => 'charan.20.teja@gmail.com',
        'phone' => '9999999999',
        'productinfo' => 'required',
        'udf1' => '1',

      ];

      $order = Indipay::prepare($parameters);
      return Indipay::process($order);
		// return view('testpayumoney');
	}

	public function testResponse(Request $request){		
		// dd(Request::all());
        // For default Gateway
        // $response = Indipay::response($request);
        
        // For Otherthan Default Gateway
        $response = Indipay::gateway('PayUMoney')->response($request);

        dd($response);
    
    
	}
	

}
