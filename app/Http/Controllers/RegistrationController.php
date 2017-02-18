<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Registration;
class RegistrationController extends Controller {

	/**
	 * Registration for a ticket.
	 */
	public function create()
	{
		return view('ticket.registration');
	}

	/**
	 * Storing the request.
	 */
	public function store(Requests\RegistrationRequest $request)
	{	
		$input = $request->all();
		$regitration = Registration::create($input);
		return view('payment');
	}

}
