<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Registration;
use App\Transaction;

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

	
}
