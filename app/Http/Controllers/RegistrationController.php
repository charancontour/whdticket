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
		$regitration = Registration::create($input);
		return redirect("payment/$registration->id");
	}
	


}