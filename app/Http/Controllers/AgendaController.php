<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Agenda;

class AgendaController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$agendas = Agenda::all();
		return view('agenda.index',compact('agendas'));
	}

	
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$agenda = Agenda::create($request->all());
		return redirect('/agenda/index');
	}

	
	public function apiResponse()
	{
		$agendas = Agenda::select('agenda_date','agenda_time','agenda_description')->get();
		return $agendas;
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$agenda = Agenda::findOrFail($id);
		$agenda->delete();
		return redirect('/agenda/index');
	}

}
