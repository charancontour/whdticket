<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Registration;
use App\Transaction;
use Paytm;

class PaymentController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($registration_id)
	{
		$registration  = Registration::findOrFail($registration_id);
		return view('payment')->with('registration',$registration);	
	}
	

	/**
	 * Send request  to paytm.
	 */
	public function sendRequestToPaytm(Request $request)
	{
		$input = $request->all();
		$registration = Registration::where('id',$input['registration_id'])->where('paid_flag','0')->first();
		if(!$registration){
			return redirect()->back();
		}
		$request = array('CUST_ID' => 1 ,'TXN_AMOUNT'=> 1 ,'CALLBACK_URL' => 'http://whdticket.dev/paytm/callback');
		return Paytm::pay($request);
		
	}

	/**
	 * Call back function for paytm.
	 */
	public function callbackRequestFromPaytm(Request $request){
		dd($request->all());
	}


	
}
