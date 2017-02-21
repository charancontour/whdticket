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
}
