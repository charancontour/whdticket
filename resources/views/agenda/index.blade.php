@extends('dashboard.layout')
@section('content')
<div class="row">
	<center><h1>Agenda</h1></center>
</div>
<form class="form-inline" method="post" action="/agenda/store">
  <div class="form-group">    
    <input type="text" name="agenda_date" class="form-control" placeholder="Date" >
  </div>
  <div class="form-group">   
    <input type="text" class="form-control" name="agenda_time" placeholder="Time">
  </div>  
  <div class="form-group">       
    <textarea class="form-control" cols="100" rows="1" name="agenda_description" placeholder="Description"></textarea>
  </div>  
  <button type="submit" class="btn btn-default">Submit</button>
</form>
<br>
<table class="table table-striped table-responsive">
	<thead>
		<tr>
			<th>Date</th>
			<th>Time</th>
			<th>Description</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
		@foreach($agendas as $agenda)
		<tr>			
			<td>{{$agenda->agenda_date}}</td>
			<td>{{$agenda->agenda_time}}</td>
			<td>{{$agenda->agenda_description}}</td>
			<td><a href="/agenda/delete/{{$agenda->id}}">
					<button class="btn btn-small btn-danger">X</button>
				</a>
			</td>			
		</tr>
		@endforeach
	</tbody>
</table>
@endsection