<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Registration;
use App\Transaction;
use App\PaytmTransaction;
use Paytm;
use Mail;

class PaymentController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($registration_id)
	{
		$registration  = Registration::where('id',$registration_id)
										->where('paid_flag',0)
										->first();		
		return view('payment')->with('registration',$registration);	
	}
	

	/**
	 * Send request  to paytm.
	 */
	public function sendRequestToPaytm(Request $request)
	{
		$input = $request->all();
		$registration = Registration::where('id',$input['registration_id'])
										->where('paid_flag','0')
										->first();
		if(!$registration){
			return redirect()->back();
		}		
		$registration->registered_flag = 1;
		$registration->payment_method = 'paytm';
		$registration->save();
		$request = array(
				'CUST_ID' => 1 ,
				'TXN_AMOUNT'=> 1 ,
				'CALLBACK_URL' => 'http://whdticket.dev/paytm/callback',
				'ORDER_ID' => $registration->id,				
				);
		return Paytm::pay($request);
		
	}

	/**
	 * Call back function for paytm.
	 */
	public function callbackRequestFromPaytm(Request $request){
		$paymentResponse =  $request->all();
		$paymentData     =  Paytm::verifyPayment($paymentResponse);	
		if($paymentData['status'] == 'success'){			
			$registration = Registration::where('id',$paymentData['data']['ORDERID'])->first();			
			$registration->paid_flag = 1;
			$registration->save();
			$registration->ticket->tickets_sold += $registration->number_of_tickets;
			$registration->ticket->save();
			$paytm_transaction = PaytmTransaction::create($paymentData['data']);
			Mail::send('emails.ticket', ['registration' => $registration], function($message) use($registration)
			{
			    $message->to($registration->email, $registration->name)->subject('World Health Day Summit Ticket!');
			});
			return redirect('success');
		}else{
			$paytm_transaction = PaytmTransaction::create($paymentResponse);
			return redirect('failure');		

		}
	}


	
}
