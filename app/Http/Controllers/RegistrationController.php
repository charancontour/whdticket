<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Registration;
use App\Ticket;
class RegistrationController extends Controller {

	/**
	 * Registration for a ticket.
	 */
	public function create()
	{
		$tickets = Ticket::all();
		return view('ticket.registration')->with('tickets',$tickets);
	}

	/**
	 * Storing the request.
	 */
	public function store(Requests\RegistrationRequest $request)
	{	
		$input = $request->all();		

		if($input['ticket_id'] == 3){
			if($input['amount'] == 0){
				return redirect()->back()->withErrors(['amount'=>'Amount should be greater than 0.']);
			}
		}
		if(!$this->checkForTicketsAvailabilty($input['ticket_id'])){
			return redirect()->back()->withErrors(['tickets availabity'=>'Tickets are not avilable.']);
		}

		$registration = Registration::create($input);

		if($registration->ticket->id != 3){
			$registration->amount = $registration->ticket->amount;
			$registration->save();	
		}				
		return redirect("payment/$registration->id");
	}

	public function checkForTicketsAvailabilty($ticket_id)
	{
		$ticket = Ticket::findOrFail($ticket_id);
		if($ticket->id == 3){
			return true;
		}else{
			$available_tickets = $ticket->total_tickets - $ticket->tickets_sold;
			if($available_tickets <= 0)
				return false;
		}
		return true;
	}
	


}
