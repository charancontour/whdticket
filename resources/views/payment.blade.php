@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Payment</div>

				<div class="panel-body">
					<table class="table table-striped table-bordered" width="100%">
						<tr>
							<td>Name</td>
							<td>{{$registration->name}}</td>
						</tr>
						<tr>
							<td>Phone Number</td>
							<td>{{$registration->phonenumber}}</td>
						</tr>
						<tr>
							<td>Email</td>
							<td>{{$registration->email}}</td>
						</tr>
						<tr>
							<td>Organization</td>
							<td>{{$registration->organization}}</td>
						</tr>
						<tr>
							<td>Designation</td>
							<td>{{$registration->designation}}</td>
						</tr>
						<tr>
							<td>Address</td>
							<td>{{$registration->address}}</td>
						</tr>
						<tr>
							<td>City</td>
							<td>{{$registration->city}}</td>
						</tr>
						<tr>
							<td>State</td>
							<td>{{$registration->state}}</td>
						</tr>
						<tr>
							<td>Zipcode</td>
							<td>{{$registration->zipcode}}</td>
						</tr>
						<tr>
							<td>Country</td>
							<td>{{$registration->country}}</td>
						</tr>	
						<tr>
							<td>Ticket Issued</td>
							<td>{{$registration->ticket->description}}</td>
						</tr>					
						<tr>
							<td>Ticket Amount</td>
							<td>{{$registration->amount}}</td>
						</tr>
						<tr>
							<td colspan="2" style="text-align:center">Payment Options</td>
						</tr>
						<tr>
							<td colspan="2" style="text-align:center">
								<form method="post" action="/paytm">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<input type="hidden" name="registration_id" value="{{$registration->id}}">
									<div class="form-group">										
										<input type="submit" value="Pay with Paytm">
									</div>
								</form>
							</td>
						</tr>												
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
