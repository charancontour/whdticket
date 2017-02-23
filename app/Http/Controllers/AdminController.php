<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Ticket;
use App\Registration;

class AdminController extends Controller {

	protected $corperate_ticket_id = 1;
	protected $ngo_ticket_id = 2;
	protected $sponser_ticket_id = 3;

	public function __construct()
	{
		$this->middleware('auth');
	}


	/**
	 * dashboard index.
	 */
	public function index()
	{
		$corperate_ticket 	= Ticket::findOrFail($this->corperate_ticket_id);
		$ngo_ticket 		= Ticket::findOrFail($this->ngo_ticket_id);
		$sponser_ticket 	= Ticket::findOrFail($this->sponser_ticket_id);

		$registrations = Registration::where('paid_flag','!=','0')->get();

		return view('dashboard.home',compact('corperate_ticket','ngo_ticket','sponser_ticket','registrations'));
	}


	public function ticketDetails($id)
	{
		$registration = Registration::findOrFail($id);
		$registration_details = [];
		$registration_details['Name'] = $registration->name;
		$registration_details['organization'] = $registration->organization;
		$registration_details['Designation']  = $registration->designation;
		$registration_details['Address'] 	  = $registration->address;
		$registration_details['City'] 		  = $registration->city;
		$registration_details['State'] 		  = $registration->state;
		$registration_details['Zipcode'] 	  = $registration->zipcode;
		$registration_details['Country'] 	  = $registration->country;
		$registration_details['Phone Number'] = $registration->phonenumber;
		$registration_details['Email'] 		  = $registration->email;



		$payment_details = [];
		if($registration->payment_method == 'paytm'){
			$payment_details['Payment Method'] = 'Paytm';
			$payment_details['Status'] = $registration->paytm->STATUS;
			$payment_details['Amount Paid'] = $registration->paytm->TXNAMOUNT;
			$payment_details['Response Message'] = $registration->paytm->RESPMSG;
			$payment_details['Gateway Name'] = $registration->paytm->GATEWAYNAME;
			$payment_details['Bank Name'] = $registration->paytm->BANKNAME;
			$payment_details['Payment Mode'] = $registration->paytm->PAYMENTMODE;
			$payment_details['Issued On'] = $registration->paytm->created_at;

		}
		
		return view('dashboard.ticket_details',compact('registration_details','payment_details'));
	}
}
