<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Registration;
use App\Transaction;
use App\PaytmTransaction;
use App\PayumoneyTransaction;
use Paytm;
use Mail;
use Softon\Indipay\Facades\Indipay; 


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
										->where('registered_flag',0)
										->first();
		if(!$registration){
			return redirect('/');
		}		
		return view('payment')->with('registration',$registration);	
	}

	/**
	 * Handles Payment Request from form request.
	 */
	public function paymentHandle(Request $request){
		$payment_method = $request->get('payment_method');
		if($payment_method == 'Paytm'){
			return	$this->sendRequestToPaytm($request);
		}

		if($payment_method == 'PayUmoney'){
			return $this->sendRequestToPayumoney($request);
		}

		return redirect('/');

	}

	/**
	 * Sends request to payumoney.
	 */
	public  function sendRequestToPayumoney($request){
		

		$input = $request->all();
		$registration = Registration::where('id',$input['registration_id'])
										->where('paid_flag','0')
										->first();
		if(!$registration){
			return redirect()->back();
		}		
		$registration->registered_flag = 1;
		$registration->payment_method = 'payumoney';
		$registration->save();

		/* All Required Parameters by your Gateway */

	      $parameters = [
	        'tid' 		=> $registration->id,
	        'order_id' 	=> $registration->id,
	        'amount' 	=> $registration->amount,
	        'firstname' => $registration->name,
	        'email' 	=> $registration->email,
	        'phone' 	=> $registration->phonenumber,
	        'udf1' 		=> $registration->id,
	        'productinfo' => 'ticket',	        
	      ];

	      $order = Indipay::prepare($parameters);
	      return Indipay::process($order);
	}


	public function callbackRequestFromPayumoney(Request $request){
		$response = Indipay::gateway('PayUMoney')->response($request);
		if($response['status'] === 'success'){
			$registration = Registration::where('id',$response['udf1'])->first();
			$registration->paid_flag = 1;
			$registration->save();
			$registration->ticket->tickets_sold += $registration->number_of_tickets;
			$registration->ticket->save();
			$response['registration_id'] = $registration->id;
			$response['json_description'] = json_encode($response);
			$payumoney_transaction = PayumoneyTransaction::create($response);			
			Mail::send('emails.ticket', ['registration' => $registration], function($message) use($registration)
			{
			    $message->to($registration->email, $registration->name)->subject('World Health Day Summit Ticket!');
			});
			return redirect('success');

		}else{
			$response['registration_id'] = $registration->id;
			$response['json_description'] = json_encode($response);
			$payumoney_transaction = PayumoneyTransaction::create($response);
			return redirect('failure');
		}
        
	}
	

	/**
	 * Send request  to paytm.
	 */
	public function sendRequestToPaytm($request)
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
				'CALLBACK_URL' => 'http://nimcarepay.com/paytm/callback',
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
